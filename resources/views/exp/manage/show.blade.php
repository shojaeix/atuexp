@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1 style="font-size: x-large">لیست پاسخ های ثبت شده</h1>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success text-right " style=" direction: RTL;"  role="alert">
                        {{ session('success') }}
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

                    <table class="table  table-borderless  mt-3 mb-3 text-center"  >
                        <thead class="  " >



                        <th>آخرین آپدیت</th>
                        <th>وضعیت آزمون</th>
                        <th>ایمیل شرکت کننده</th>
                        <th>شماره ثبت نام</th>

                        </thead>
                        <tbody>

                        <tr>
                            <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($exp->completed_at) }}</td>
                            <td style="direction: rtl">{{ [ 'pending' => 'در انتظار تکمیل', 'complete' => 'تکمیل شده'][$exp->status] }} @if($exp->status == 'pending') ( مرحله {{ $exp->last_complete_step+1 }} ) @endif</td>
                            <td>{{ $exp->email }}</td>
                            <td>{{ $exp->id }}</td>
                        </tr>

                        </tbody>
                    </table>

                    @for($i=1; $i<=3; $i++)
                    <div class="d-flex justify-content-center alert alert-info" style="font-size: large" ><strong>مرحله
                        {{ [1=> 'اول',
                            2 => 'دوم',
                            3 => 'سوم'][$i] }}</strong></div>
                    <table class="table table-hover  mt-3 mb-3 text-center table-borderless" >
                        <thead>
                        <th ></th>
                        <th >پاسخ</th>
                        <th >برچسب</th>
                        <th  >شناسه سوال</th>

                        </thead>
                        <tbody>
                        @foreach($exp->answers as $meta)
                        @if($meta->step_number == $i)
                        <tr>
                            @if($meta->question_name == 'question_1')
                            <td rowspan="6" ><img class="col-12"  src="http://dev.atuexp.ir/images/steps/4.jpg" >  </td>
                            @endif
                            <td>{{ $meta->value }}</td>
                            <td>
                                @if(isset($questionsData[$meta->step_number][$meta->question_name]))
                                {{ $questionsData[$meta->step_number][$meta->question_name]['label'] }}
                                @endif
                            </td>
                            <td>{{ $meta->question_name }}</td>

                        </tr>

                        @endif
                        @endforeach
                        </tbody>
                    </table>
                    @endfor





                    <div class="d-flex justify-content-center alert alert-info" style="font-size: large" ><strong>
                            سوالات جمعیت شناسی
                        </strong></div>
                    <table class="table table-hover  mt-3 mb-3 text-center table-borderless" >
                        <thead>
                        <th ></th>
                        <th >پاسخ</th>
                        <th >برچسب</th>
                        <th  >شناسه سوال</th>

                        </thead>
                        <tbody>
                        @foreach($exp->answers as $meta)
                        @if($meta->step_number == 4)
                        <tr>
                            @if($meta->question_name == 'question_1')
                            <td rowspan="8" ><img class="col-12"  src="http://dev.atuexp.ir/images/steps/4.jpg" >  </td>
                            @endif
                            <td>{{ $meta->value }}</td>
                            <td>
                                @if(isset($questionsData[$meta->step_number][$meta->question_name]))
                                {{ $questionsData[$meta->step_number][$meta->question_name]['label'] }}
                                @endif
                            </td>
                            <td>{{ $meta->question_name }}</td>

                        </tr>

                        @endif
                        @endforeach
                        </tbody>
                    </table>


                    <div class="d-flex justify-content-center" >
                        <a href="{{ route('exp.management.index') }}" >
                            <button class="btn btn-primary m-2">مشاهده لیست آزمون ها</button></a>
                        <!--
                        <a href="{{ route('exp.management.index') }}" >
                            <button class="btn btn-danger m-2">علامتگذاری به عنوان مشاهده نشده
                            </button></a>
                        <a href="{{ route('exp.management.index') }}" >
                            <button class="btn btn-success m-2">علامتگذاری به عنوان مشاهده شده
                            -->
                            </button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection