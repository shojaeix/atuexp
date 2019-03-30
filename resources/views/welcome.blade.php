@extends('layouts.app')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ route('exp.intro') }}">مشارکت در طرح</a>
                </div>
            @endif

            <div class="content">

                <div class="row">
                <div class="container card col col-8 ">
                    <div class="title m-b-md mt-3">
                        {{ config('app.name') }}
                    </div>
                    <div class="m-3">
                        سامانه پیش رو به منظور مطالعه‌ در حوزه‌ی مالی و سرمایه‌گذاری ایجاد شده است. هیچ‌گونه اطلاعات شخصی در این پرسشنامه از شما پرسیده نمی‌شود.
                        برای شرکت در این طرح، روی گزینه "مشارکت" کلیک نمایید.
                        تکمیل فرم سوالات، 4 الی 6 دقیقه زمان نیاز دارد.
                        پیشاپیش از شرکت شما در این طرح سپاسگزاریم، به امید موفقیت شما عزیزان.
                    </div>

                    <div class="links m-3">

                  
                        <a href=""  class="btn  btn-outline-success">لینک  1</a>
                        <a href="https://atu.ac.ir"  class="btn  btn-outline-secondary">وبسایت دانشگاه</a>
                        <a href="{{ route('exp.intro') }}" class="btn  btn-outline-primary">مشارکت در طرح</a>
                    </div>

                </div>


                </div>

            </div>



        </div>


    </body>
</html>
