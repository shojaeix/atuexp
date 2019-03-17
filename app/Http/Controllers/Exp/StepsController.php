<?php

namespace App\Http\Controllers\Exp;

use App\Exp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exp\Answer;

class StepsController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\IdentifyForExp::class);
    }

    function show(Request $request, $number){
        // get exp object
        $exp = Exp::findOrFail(session('exp_id'));
        // redirect user to result page, if Exp completed
        if($exp->last_complete_step == 4){
            return redirect(route('exp.result'));
        }
        // redirect user to next step if this step passed before
        if($exp->last_complete_step >= $number){
            return redirect(route('exp.step', ['step_number' => $number+1 ]));
        }
        $viewName = (($number<4) ? 1 : 4);

        $exp = $this->generateRandomImageNumbers($exp);
        $exp->save();
        $imageNumber = 1;
        if($number < 4){
            $imageNumber = $exp->data('step' . $number . 'ImageNumber', 1 );
        }

        return view('exp.step.' . $viewName, [
            'step_number' => $number,
            'imageNumber' => $imageNumber,
        ]);
    }

    function submit(Request $request, $number){
        // get exp object
        $exp = Exp::findOrFail(session('exp_id'));
        // redirect user to result page, if Exp completed
        if($exp->last_complete_step == 4){
            return redirect(route('exp.result'));
        }
        // redirect user to next step if this step passed before
        if($exp->last_complete_step >= $number){
            return redirect(route('exp.step', ['number' => $number+1 ]));
        }
        // validate inputs
        $validatedData = $this->validateRequest($request, $number);
        // save answers
        foreach($validatedData as $questionName=>$value) {
            $answer = new Answer;
            $answer->exp_id = $exp->id;
            $answer->step_number = $number;
            $answer->question_name = $questionName;
            $answer->value = $value;
            $answer->save();
        }
        // update experiment last_completed_step
        $exp->last_complete_step = $number;
        // update completed_at attribute
        $exp->completed_at = now();
        // save updates on experiment object
        $exp->save();
        // redirect user to result page, if Exp completed
        if($exp->last_complete_step == 4){
            // add success alert
            session('success', 'تمام پاسخ های شما با موفقیت ثبت شدند و آزمون به پایان رسید.');
            // redirect
            return redirect(route('exp.result'));
        }
        // redirect user to next step if this step passed before
        if($exp->last_complete_step >= $number){
            // add success alert
            session('success', 'پاسخ های مرحله ' . $number . ' آزمون شما با موفقیت ثبت شدند.');
            // redirect
            return redirect(route('exp.step', [ 'number' => ($number+1) ]));
        }
    }

    private function validateRequest(Request $request, $number){

        $requiredQuestionError =  'پاسخ دهی به :attribute الزامیست.';
        $customErrorTexts = [
            'question_1.required' => $requiredQuestionError,
            'question_2.required' => $requiredQuestionError,
            'question_3.required' => $requiredQuestionError,
            'question_4.required' => $requiredQuestionError,
            'question_5.required' => $requiredQuestionError,
            'question_6.required' => $requiredQuestionError,
        ];
        $translateFields = [
            'question_1' => 'سوال اول',
            'question_2' => 'سوال دوم',
            'question_3' => 'سوال سوم',
            'question_4' => 'سوال چهارم',
            'question_5' => 'سوال پنجم',
            'question_6' => 'سوال ششم',
            'question_7' => 'سوال هفتم',
            'question_8' => 'سوال هشتم',
        ];
        switch($number){
            case 1:
            case 2:
            case 3:
                $customErrorTexts['question_6.gte'] = 'مقدار وارد شده برای :attribute باید بزرگ تر از :value باشد.';
                return $request->validate([
                    'question_1' => 'required|int|min:-4|max:4',
                    'question_2' => 'required|int|min:1|max:4',

                    'question_3' => 'required|int',
                    'question_4' => 'required|int',

                    'question_5' => 'required|int',
                    'question_6' => 'required|int|gte:question_5',

                ], $customErrorTexts, $translateFields);
                break;
            case 4:
                return $request->validate([
                    'question_1' => 'required|int|min:-2|max:2',
                    'question_2' => 'required|string|in:male,female',

                    'question_3' => 'required|int|min:0|max:4',
                    'question_4' => 'required|string',

                    'question_5' => 'required|int|min:0',
                    'question_6' => 'required|string|in:a,b,c,d,e,f,g,h',

                    'question_7' => 'required|string|in:yes,no',
                    'question_8' => 'required|string|in:a,b,c,d',
                ], $customErrorTexts, $translateFields);
                break;
            default: abort(404);
        }
    }

    private function generateRandomImageNumbers($exp){

        if($exp->data('imageNumbersGenerated', false)) {
            return $exp;
        }
        // set flag
        $exp->setData('imageNumbersGenerated', true);
        // add all image names to an array
        $imageNumbers = [ 1, 2, 3, 4, 5, 6 ];
        // roll per step
        for($i = 1; $i<=3; $i++){
            // get a random key from image numbers array
            $randomKey = array_rand($imageNumbers);
            // get random image number value
            $randomImageNumber = $imageNumbers[$randomKey];
            // delete random element from image numbers array
            unset($imageNumbers[$randomKey]);
            // set step image number to exp object
            $exp->setData('step' . $i . 'ImageNumber', $randomImageNumber);
        }
        return $exp;
    }
}
