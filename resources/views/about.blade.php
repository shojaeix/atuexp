<?php
/**
 * Created by PhpStorm.
 * User: Amin
 * Date: 05/04/2019
 * Time: 16:36
 */

$mainText = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.';
$aboutOwner = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.';
?>

@extends('layouts/app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header text-right">
                    پدیدآورندگان
                </div>

                <div class="card-body text-right" style="direction: rtl">
                    <div>
                        {{ $mainText }}
                    </div>
                    <hr>
                    <div class="row mt-3 mb-2" >
                        <div class="col col-8" >

                            <div>
                                <b>بابک خانقلی</b>
                            </div>
                            <div>{{ $aboutOwner }}{{ $aboutOwner }}</div>
                        </div>
                        <div class="col col-4" >
                            <img src="http://nima.ir/images/biz/iranic13.jpg" class="w-100 h-100">
                        </div>
                    </div>
                    <hr>
                    <div class="mt-3 mb-2">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
