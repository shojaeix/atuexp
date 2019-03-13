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

                    <form action="{{ route('exp.step.submit', [ 'number' => $step_number ]) }}" method="post">
                        @csrf
                        <div>
                            <div class="">نسبت به میانگین جامعه، دانش سرمایه گذاری در سهام خود را چگونه ارزیابی میکنید ؟</div>
                                <div>
                                    @foreach([
                                    '2' => 'خیلی زیاد',
                                    '1' => 'زیاد',
                                    '0' => 'متوسط',
                                    '-1' => 'کم',
                                    '-2' => 'خیلی کم',

                                    ] as $value=>$label)

                                    <label for="form.question_1.radioButton.{{ $value }}" >{{ $label }}</label>
                                    <input id="form.question_1.radioButton.{{ $value }}" name="question_1" type="radio" value="{{ $value }}" >
                                    @endforeach
                                </div>
                        </div>

                        <div>

                            <div class="">جنسیت</div>

                            <label for="form.question_2.radioButton.male" >آقا</label>
                            <input id="form.question_2.radioButton.male" name="question_2" type="radio" value="male" >
                            <label for="form.question_2.radioButton.female" >خانم</label>
                            <input id="form.question_2.radioButton.female" name="question_2" type="radio" value="female" >
                        </div>
                        <div>

                            <div>
                                تحصیلات
                            </div>
                            <div>
                                <select name="question_3" >
                                    <option value="0" >--</option>
                                    <option value="1" >دیپلم</option>
                                    <option value="2" >کارشناسی</option>
                                    <option value="3" >کارشناسی ارشد</option>
                                    <option value="4" >دکترا</option>
                                </select>
                            </div>

                        </div>
                            <div>

                                <div>
                                    رشته تحصیلی
                                </div>
                                <div>
                                    <input name="question_4" type="text" value="{{old('question_4')}}" >
                                </div>

                            </div>
                        <div>

                            <div>
                                سن
                            </div>
                            <div>
                                <input name="question_5" type="number" value="{{old('question_5', 0)}}" >
                            </div>

                        </div>

                        <div>

                            <div>
                                <div>6.  چگونه به قیمت پیش بینی خود دست یافتید ؟</div>

                                @foreach([
                                'a' => 'قیمت سهام به احتمال زیاد بعد از کاهش، افزایش پیدا می کند.',
                                'b' => 'اگر نمودار سهم، دارای شیب منفی باشد به احتمال زیاد در آینده، قیمت سهم کاهش
                                می یابد.',
                                'c' => 'سهام به احتمال زیاد بازدهی مثبت تولید خواهد کرد.',
                                'd' => 'اگر قیمت فعلی سهم از قیمت سال گذشته آن کمتر باشد به احتمال زیاد در آینده
                                زیان بیشتری ایجاد خواهد کرد.',
                                'e' => ': اگر قیمت فعلی سهم از قیمت سال گذشته آن بیشتر باشد به احتمال زیاد در آینده
                                سود بشیتری ایجاد خواهد کرد.',
                                'f' => 'نمی دانم',
                                'g' => 'اگر نمودار سهم، دارای شیب مثبت باشد به احتمال زیاد در آینده، قیمت سهم
                                افزایش می یابد.',
                                'h' => 'هیچ کدام از توضیحات بالا در تصمیم گیری من دخیل نبوده است.',


                                ] as $value=>$label)

                                <label for="form.question_6.radioButton.{{ $value }}" >{{ $label }}</label>
                                <input id="form.question_6.radioButton.{{ $value }}" name="question_6" type="radio" value="{{ $value }}" >
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <div>آیا تجربه سرمایه گذاری رد بورس اوراق بهادار تهران را داشته اید ؟</div>
                            <label for="form.question_7.radioButton.yes" >بله</label>
                            <input id="form.question_7.radioButton.male" name="question_7" type="radio" value="yes" >
                            <label for="form.question_7.radioButton.female" >خیر</label>
                            <input id="form.question_7.radioButton.female" name="question_7" type="radio" value="no" >
                        </div>

                        <div>
                            @foreach([
                            'a' => 'حداکثر دوبار',
                            'b' => 'بین دو تا پنج بار',
                            'c' => 'بین پنج تا ده بار',
                            'd' => 'بالای ده بار',

                            ] as $value=>$label)
                            در صورت معامله در بازار بورس اوراق بهادار تهران، تعداد معاملات شما در طول سال به چه میزان است؟
                            <label for="form.question_8.radioButton.{{ $value }}" >{{ $label }}</label>
                            <input id="form.question_8.radioButton.{{ $value }}" name="question_8" type="radio" value="{{ $value }}" >
                            @endforeach
                        </div>


                        <button class="btn btn-primary" type="submit">submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
