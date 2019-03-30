<?php

namespace App\Http\Controllers\Exp;

use App\Exp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementController extends Controller
{
    function __construct()
    {
        // todo add OnlyAdmin middleware
    }

    function index(){
        $exps = Exp::paginate(10);
        $count = Exp::query()->count();
        return view('exp.manage.index', [
            'exps' => $exps,
            'count' => $count,
        ]);
    }

    function show($id){
        $exp = Exp::findOrFail($id);

        $questionsData = include base_path('resources/exp/questions.php');

        return view('exp.manage.show', [
            'exp' => $exp,
            'questionsData' => $questionsData,
        ]);
    }
}
