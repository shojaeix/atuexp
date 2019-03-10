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
                <div class="card-header">Intro</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- show errors -->
                    @if($errors->any())
                        @foreach($errors->all() as $err)
                            <div class="alert alert-danger" role="alert">
                                {{ $err }}
                            </div>
                        @endforeach
                    @endif

                    <form action="{{ route('exp.identify') }}" method="post">
                        @csrf
                        <div class="">
                        <div class="row mb-2">
                        <label for="form.email" class="col col-3">Email address: </label>
                        <input name="email" type="email" class="form-control col col-7" id="form.email">
                        </div>

                        <div class="row" >
                            <div class="col col-3" ></div>
                            <button class="btn btn-primary col col-3 mb-2" >Start</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection