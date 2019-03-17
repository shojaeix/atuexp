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
                    <div class="text-right">تعداد کل ثبت نام ها: {{ $count }}</div>
                    <table class="table table-hover  table-striped mt-3 mb-3" >
                        <thead class="thead-light" >


                        <th></th>
                        <th>وضعیت آزمون</th>
                        <th>ایمیل شرکت کننده</th>
                        <th>شماره ثبت نام</th>

                        </thead>
                        <tbody>
                        @foreach($exps as $exp)
                        <tr>

                            <td></td>
                            <td>{{ $exp->status }} @if($exp->status == 'pending') (مرحله {{ $exp->last_complete_step+1 }} ) @endif</td>
                            <td>{{ $exp->email }}</td>
                            <td>{{ $exp->id }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center" style="direction: rtl" >
                        @php echo $exps->links(); @endphp</div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection