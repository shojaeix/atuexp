<?php

namespace App\Http\Controllers\Exp;

use App\Exp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            return redirect(route('exp.step.' . ($number+1)));
        }

        return view('exp.step.' . $number, [ 'step_number' => $number ]);
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
            return redirect(route('exp.step.' . ($number+1)));
        }
        // validate inputs
        switch($number){
            case 1:
            case 2:
            case 3:
                $validatedData = $request->validate([

                ]);
                break;
            case 4:

                break;
            default: abort(404);
        }


    }
}
