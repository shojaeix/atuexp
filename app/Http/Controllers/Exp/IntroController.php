<?php

namespace App\Http\Controllers\Exp;

use App\Exp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroController extends Controller
{
    /**
     * Show identify form OR redirect user to exp step 1 if user already identified
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    function intro(){
        // redirect user to step 1 if user already indentified
        if(session()->has('exp_id')){
            return redirect(route('exp.step', ['number' => 1]));
        }
        // show identify page
        return view('exp.intro');
    }

    /**
     * Identify user by submitted  values and set exp_id in session.
     * @return Redirect redirect to exp step 1
     */
    function identify(Request $request){
        // redirect user to step 1 if user already indentified
        if(session()->has('exp_id')){
            return redirect(route('exp.step', ['number' => 1]));
        }
        // validate input
        $validatedData = $request->validate([
            'email' => 'required|email|unique:exps',
        ]);
        // create and save new Exp
        $exp = new Exp($validatedData);
        $exp->save();
        // set session identify key
        session()->put('exp_id', $exp->id);
        // redirect to exp step 1
        //return redirect(route('exp.step.1'));
        return redirect(route('exp.step', ['number' => 1]));
    }
}
