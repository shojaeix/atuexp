<?php
/**
 * Created by PhpStorm.
 * User: Amin
 * Date: 09/03/2019
 * Time: 23:16
 */
?>
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Intro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div><img src="http://cdn.time.ir/Content/media/image/2019/01/72_orig.png" ></div>

                    <form action="{{ route('exp.step.submit', [ 'number' => $step_number ]) }}" method="post">
                        @csrf
                        <div class="">به چه میزان از عملکرد سرمایه گذاری خود راضی هستید ؟</div>
                        <div>
                            @foreach([
                            '4' => '**** Very satisfied',
                            '3' => '***',
                            '2' => '**',
                            '1' => '*',
                            '0' => 'Natural',
                            '-1' => '-',
                            '-2' => '--',
                            '-3' => '---',
                            '-4' => '---- Very insatisfied',
                            ] as $value=>$label)

                            <label for="form.question_1.radioButton.{{ $value }}" >{{ $label }}</label>
                            <input id="form.question_1.radioButton.{{ $value }}" name="querstion_1" type="radio" value="{{ $value }}" >
                            @endforeach
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
