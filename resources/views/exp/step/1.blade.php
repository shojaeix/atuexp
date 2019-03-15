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
                <div class="card-header text-right">مرحله
                <?php echo [1 => 'اول', 2 => 'دوم', 3 => 'سوم'][$step_number]; ?>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @foreach($errors->all() as $err)
                    <div class="alert alert-danger text-right" style="direction: rtl" role="alert">{{ $err }}</div>
                    @endforeach
                    <div ><img width="100%" src="http://cdn.time.ir/Content/media/image/2019/01/72_orig.png" ></div>


                    <form action="{{ route('exp.step.submit', [ 'number' => $step_number ]) }}" method="post"
                          class="text-right" style="direction: rtl">

                        @csrf
                        <div class="">1. به چه میزان از عملکرد سرمایه گذاری خود راضی هستید ؟</div>
                        <div class="row border-bottom">
                            <table class="table-borderless col col-12 text-center  mb-1">
                                <tr>
                            @foreach([
                                '-4' => 'بسیار ناراضی',
                                '-3' => '',
                                '-2' => '',
                                '-1' => '',
                                '0' => 'معمولی',
                                '1' => '',
                                '2' => '',
                                '3' => '',
                                '4' => 'بسیار راضی',
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

                        <div class="mt-3">2. آیا سهم خود را در قیمت جاری به فروش میرسانید یا نگهداری میکنید ؟</div>
                        <div class="border-bottom">
                            @foreach([
                            '4' => '**** به احتمال زیاد میفروشم',
                            '3' => '***',
                            '2' => '**',
                            '1' => '*به احتمال زیاد نگهداری میکنم',
                            ] as $value=>$label)


                            @endforeach

                            <table class="table-borderless col col-12 text-center mb-1">
                                <tr>
                                    @foreach([
                                    '1' => 'به احتمال زیاد نگهداری میکنم',
                                    '2' => '',
                                    '3' => '',
                                    '4' => ' به احتمال زیاد میفروشم',
                                    ] as $value=>$label)

                                    <td >
                                        <div><label for="form.question_2.radioButton.{{ $value }}" >{{ $label }}</label></div>
                                        <div>
                                            <input id="form.question_2.radioButton.{{ $value }}" name="question_2" type="radio" value="{{ $value }}"
                                                   @if(is_numeric(old('question_2', null)) and old('question_2', null) == $value) checked @endif >
                                        </div>
                                    </td>

                                    @endforeach
                                </tr>
                            </table>
                        </div>

                        <div class="mt-3">
                            3. کمترین قیمت منتطقی که سهام خود را به فروش میرسانید چیست ؟
                        </div>
                        <div class="border-bottom">
                           <div class="row" >
                               <span class=" m-3 col-md-2">کمترین قیمت : </span>
                               <span><input name="question_3" type="text" value="{{old('question_3')}}" class="form-control m-3 @if($errors->has('question_2')) is-invalid @endif" ></span>
                           </div>
                        </div>


                        <div class="mt-3">
                             4. پیش بینی شما از قیمت سهام در انتهای 12 ماهه ی آتی چیست ؟
                        </div>
                        <div class="border-bottom">
                            <div class="row" >
                                <span class=" m-3 col-md-2">قیمت : </span>
                                <span><input name="question_4" type="text" value="{{old('question_4')}}"  class="form-control  m-3 @if($errors->has('question_2')) is-invalid @endif"></span>
                            </div>
                        </div>

                        <div class="mt-3">
                             5. پیش بینی بد بینانه ی شما از قیمت سهام در انتهای 12 ماهه ی آتی چیست ؟ (در 95% مواقع قیمت سهام بالاتر ازا ین قیمت است)
                        </div>
                        <div class="border-bottom">
                            <div class="row" >
                                <span class=" m-3 col-md-2">قیمت : </span>
                                <span><input name="question_5" type="text" value="{{old('question_5')}}"  class="form-control  m-3 @if($errors->has('question_2')) is-invalid @endif"></span>
                            </div>
                        </div>

                        <div class="mt-3">
                            6. پیش بینی خوشبینانه ی شما از قیمت سهام در انتهای 12 ماهه ی آتی چیست ؟(در 95% مواقع قیمت سهام پایینتر ازا ین قیمت است)
                        </div>
                        <div >
                            <div class="row" >
                                <span class=" m-3 col-md-2 ">قیمت : </span>
                                <span><input name="question_6" type="text" value="{{old('question_6')}}"  class="form-control  m-3 @if($errors->has('question_2')) is-invalid @endif"></span>
                            </div>
                        </div>
                        <div class="m-3 text-danger">لطفا در پاسخ دهی کمال دقت را به عمل آورید، زیرا در هیچیک از مراحل امکان بازگشت به مرحله قبل میسر نیست.</div>
                        <button class="btn btn-primary col-12"   type="submit">ثبت و ادامه</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
