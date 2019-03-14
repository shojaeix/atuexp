<?php
/**
 * Created by PhpStorm.
 * User: Amin
 * Date: 08/03/2019
 * Time: 22:52
 */
?>
@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">
                    شروع آزمون
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- show errors -->

                    @if($errors->any())
                        @foreach($errors->all() as $err)
                            <div class="alert alert-danger text-right " style=" direction: RTL;" role="alert">
                                {{ $err }}
                            </div>
                        @endforeach
                    @endif

                    <form action="{{ route('exp.identify') }}" method="post">
                        @csrf
                        <div class="">
                        <div class=" mb-2">
                        <div><label for="form.email" class="text-right float-right">برای ورود به آزمون، لطفا آدرس ایمیل خود را وارد کنید
                            </label></div>
                        <div><input name="email" type="email" class="form-control col-6 @if($errors->has('email')) is-invalid @endif" id="form.email" placeholder="example@email.com"></div>
                        </div>
                            <div class="">
                                <button class="btn btn-primary  mb-2 col-12 " ><strong>شروع</strong></button>
                            </div>
                        <div class="row" >
                            <div class="col align-items-center" ></div>

                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection