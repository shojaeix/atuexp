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

                <div class="card-body  text-right "  style=" direction: RTL;"  >
                    @if (session('success'))
                    <div class="alert alert-success  "role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- show errors -->

                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <div class="alert alert-danger"   role="alert">
                        {{ $err }}
                    </div>
                    @endforeach
                    @endif

                    @if($is_exp_complete)
                    از اینکه در این آزمون شرکت کردید، سپاسگزاریم.
                    @else

                    آخرین مرحله تکمیل شده:
                    {{ $exp->last_complete_step }}
                    @endif

                    <div class="d-flex justify-content-center mt-3"><a href="{{ route('welcome') }}" class="btn btn-outline-primary " >صفحه اصلی</a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection