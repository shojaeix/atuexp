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
        return view('exp.step.' . $viewName, [ 'step_number' => $number ]);
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
        $exp->save();
        // redirect user to result page, if Exp completed
        if($exp->last_complete_step == 4){
            // add success alert
            session('success', 'پاسخ های شما با موفقیت ثبت شدند.');
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
        switch($number){
            case 1:
            case 2:
            case 3:
                return $request->validate([
                    'question_1' => 'required|int|min:-4|max:4',
                    'question_2' => 'required|int|min:1|max:4',

                    'question_3' => 'required|int',
                    'question_4' => 'required|int',

                    'question_5' => 'required|int',
                    'question_6' => 'required|int|gte:question_5',

                ]);
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
                ]);
                break;
            default: abort(404);
        }
    }
}
