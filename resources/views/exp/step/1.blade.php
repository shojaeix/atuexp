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

                    @foreach($errors->all() as $err)
                    <div class="alert alert-danger" role="alert">{{ $err }}</div>
                    @endforeach
                    <div ><img width="100%" src="http://cdn.time.ir/Content/media/image/2019/01/72_orig.png" ></div>

                    <form action="{{ route('exp.step.submit', [ 'number' => $step_number ]) }}" method="post" class="text-right">
                        @csrf
                        <div class="">به چه میزان از عملکرد سرمایه گذاری خود راضی هستید ؟</div>
                        <div class="row">
                            <table class="table-borderless col col-12 text-center">
                                <tr>
                            @foreach([

                                    '-1' => '',
                                    '-2' => '',
                                    '-3' => '',
                                    '-4' => 'بسیار ناراضی',
                            '0' => 'معمولی',
                                    '4' => 'بسیار راضی',
                                    '3' => '***',
                                    '2' => '**',
                                    '1' => '*',
                            ] as $value=>$label)

                            <td >
                            <div><label for="form.question_1.radioButton.{{ $value }}" >{{ $label }}</label></div>
                            <div>
                                <input id="form.question_1.radioButton.{{ $value }}"  name="question_1" type="radio" value="{{ $value }}"
                                        @if(is_numeric(old('question_1', null)) and old('question_1', null) == $value) checked @endif >
                            </div>
                            </td>

                            @endforeach
                                </tr>
                            </table>
                        </div>

                        <div class="">آیا سهم خود را در قیمت جاری به فروش میرسانید یا نگهداری میکنید ؟</div>
                        <div>
                            @foreach([
                            '4' => '**** به احتمال زیاد میفروشم',
                            '3' => '***',
                            '2' => '**',
                            '1' => '*به احتمال زیاد نگهداری میکنم',
                            ] as $value=>$label)

                            <label for="form.question_2.radioButton.{{ $value }}" >{{ $label }}</label>
                            <input id="form.question_2.radioButton.{{ $value }}" name="question_2" type="radio" value="{{ $value }}"
                                   @if(is_numeric(old('question_2', null)) and old('question_2', null) == $value) checked @endif
                            >
                            @endforeach
                        </div>

                        <div>
                            3. کمترین قیمت منتطقی که سهام خود را به فروش میرسانید چیست ؟
                        </div>
                        <div>
                            <input name="question_3" type="text" value="{{old('question_3')}}" >
                        </div>


                        <div>
                             4. پیش بینی شما از قیمت سهام در انتهای 12 ماهه ی آتی چیست ؟
                        </div>
                        <div>
                            <input name="question_4" type="text" value="{{old('question_4')}}" >
                        </div>

                        <div>
                             5. پیش بینی بد بینانه ی شما از قیمت سهام در انتهای 12 ماهه ی آتی چیست ؟ (در 95% مواقع قیمت سهام بالاتر ازا ین قیمت است)
                        </div>
                        <div>
                            <input name="question_5" type="text" value="{{old('question_5')}}" >
                        </div>

                        <div>
                            پیش بینی خوشبینانه ی شما از قیمت سهام در انتهای 12 ماهه ی آتی چیست ؟(در 95% مواقع قیمت سهام پایینتر ازا ین قیمت است)
                        </div>
                        <div>
                            <input name="question_6" type="text" value="{{old('question_6')}}" >
                        </div>

                        <button class="btn btn-primary" type="submit">submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
