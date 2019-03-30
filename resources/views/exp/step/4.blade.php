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
        <div class="col-md-8 text-right" style="direction: rtl">
            <div class="card">
                <div class="card-header ">مرحله چهارم و نهایی</div>

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
                            <div class="m-1">1. نسبت به میانگین جامعه، دانش سرمایه گذاری در سهام خود را چگونه ارزیابی میکنید ؟</div>
                                <div>

                                    <div class="row" >
                                    <div class="m-3">انتخاب کنید: </div>
                                    <select name="question_1" class="form-control col-md-3 mt-2 mb-3 ml-3 mr-2">
                                        <option  >--</option>
                                        @foreach([
                                        '2' => 'خیلی زیاد',
                                        '1' => 'زیاد',
                                        '0' => 'متوسط',
                                        '-1' => 'کم',
                                        '-2' => 'خیلی کم',

                                        ] as $value=>$label)
                                        <option value="{{$value}}" >{{$label}}</option>

                                        @endforeach

                                    </select>
                                    </div>
                                </div>
                        </div>

                        <div>
                        <div  >
                            <div class="mr-2 mb-2 mt-2 ml-2">2. جنسیت شما </div>

                            <div class="row m-2" >
                                <div class="col-md-1 m-3" ></div>
                            <div class="m-2">
                            <label for="form.question_2.radioButton.male" >👨🏻  آقا
                                </label>
                            <input id="form.question_2.radioButton.male" name="question_2" type="radio" value="male" >
                            </div>
                            <div class="m-2" >
                            <label for="form.question_2.radioButton.female" >👩🏻 خانم
                            </label>
                            <input id="form.question_2.radioButton.female" name="question_2" type="radio" value="female" >
                            </div>
                            </div>
                        </div>
                        </div>

                        <div>

                            <div>
                                3. تحصیلات
                            </div>
                            <div class="row">
                                <div class="m-3">انتخاب کنید:</div>
                                <select name="question_3" class="form-control col-md-3 mt-2 mb-3 ml-3 mr-2">
                                    <option >--</option>
                                    <option value="1" >دیپلم</option>
                                    <option value="2" >کارشناسی</option>
                                    <option value="3" >کارشناسی ارشد</option>
                                    <option value="4" >دکترا</option>
                                </select>
                            </div>

                        </div>
                            <div>

                                <div>
                                    4. رشته تحصیلی
                                </div>
                                <div>

                                </div>
                                <div class="row">
                                    <div class="m-3">وارد کنید:</div>
                                    <input name="question_4" type="text" value="{{old('question_4')}}" class="form-control col-md-3 mt-2 mb-3 ml-3 mr-2">
                                </div>

                            </div>
                        <div>

                            <div>
                                5. سن
                            </div>

                            <div class="row">
                                <div class="m-3 ml-4">وارد کنید:</div>
                                <input  name="question_5" type="number" value="{{old('question_5', 0)}}" class="form-control col-md-3 mt-2 mb-3 ml-3 mr-2">
                            </div>




                        </div>

                        <div>

                            <div class="  mt-2 border-bottom">
                                <div>6.  چگونه به قیمت پیش بینی خود دست یافتید ؟</div>
                                @php $questio6Fields = [
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


                                ]; @endphp

                                <table>
                                @foreach($questio6Fields as $value=>$label)
                                    <tr>
                                        <td>
                                            <input id="form.question_6.radioButton.{{ $value }}" name="question_6" type="radio" value="{{ $value }}"
                                                   class="mb-2 mt-2 mr-2 ml-1" >

                                        </td><td>
                                            <label for="form.question_6.radioButton.{{ $value }}" class="m-2">{{ $label }}</label>
                                        </td>
                                    </tr>
                                @endforeach
                                </table>


                            </div>
                        </div>
                        <div class="mt-2 border-bottom">
                        <div>
                            <div>7. آیا تجربه سرمایه گذاری رد بورس اوراق بهادار تهران را داشته اید ؟</div>
                            <div class="mt-3 mb-3 ml-3 mr-2">
                            <label for="form.question_7.radioButton.yes"  class="m-1">بله</label>
                            <input id="form.question_7.radioButton.male" name="question_7" type="radio" value="yes"  class="m-1">
                            <label for="form.question_7.radioButton.female" class="m-1">خیر</label>
                            <input id="form.question_7.radioButton.female" name="question_7" type="radio" value="no"  class="m-1">
                            </div>
                        </div>
                        </div>

                        <div class=" mt-2">
                            8. در صورت معامله در بازار بورس اوراق بهادار تهران، تعداد معاملات شما در طول سال به چه میزان است؟
                            <table>
                            @foreach([
                            'a' => 'حداکثر دوبار',
                            'b' => 'بین دو تا پنج بار',
                            'c' => 'بین پنج تا ده بار',
                            'd' => 'بالای ده بار',

                            ] as $value=>$label)




                            <tr>
                                <td>
                                    <input id="form.question_8.radioButton.{{ $value }}" name="question_8" type="radio" value="{{ $value }}" >

                                </td><td>
                                    <label for="form.question_8.radioButton.{{ $value }}" class="m-2">{{ $label }}</label>
                                </td>
                            </tr>
                            @endforeach
                            </table>
                        </div>

                        <div class="row mt-2">
                        <button class="btn btn-primary col-12 col"  type="submit">ثبت و پایان</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
