<?php

namespace App\Http\Controllers\Exp;

use App\Exp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\IdentifyForExp::class);
    }

    function show(){

        $exp = Exp::findOrFail(session('exp_id'));

        $answers = $exp->answers;

        session()->forget('exp_id');

        return view('exp.result', [
            'exp' => $exp,
            'answers' => $answers,
            'is_exp_complete' => ($exp->last_complete_step == 4),
        ]);
    }
}
