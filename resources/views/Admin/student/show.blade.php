@extends('Admin.master')
@section('content')
    <h2 class="sub-header">لیست آخرین ثبت نام ها :</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام پدر</th>
                <th>نام مادر</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
                {{ $i=1 }}
                @foreach($students as $student)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>لورم</td>
                        <td>ایپسوم</td>
                        <td>لورم</td>
                        <td>13</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection