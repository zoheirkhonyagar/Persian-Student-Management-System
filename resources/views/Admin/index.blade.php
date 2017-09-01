@extends('Admin.master')
@section('content')
    <h1 class="page-header">صفحه اصلی</h1>

    <div class="row placeholders">
        @foreach($users as $user)
            <div class="col-xs-6 col-sm-2 placeholder">
                <img src="{{ $user->image != null ? "/" .$user->image['thumb'] : "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" }}" width="200" class="img-responsive" alt="Generic placeholder thumbnail">
                <h4>{{ $user->type == "super-admin" ? "مدیر کل" : "مدیر معمولی" }}</h4>
                <span class="text-muted">{{ $user->first_name . " " . $user->last_name }}</span>
            </div>
        @endforeach
    </div>

    <h2 class="sub-header">لیست آخرین ثبت نام ها :</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نام پدر</th>
                <th>سن</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>لورم</td>
                <td>ایپسوم</td>
                <td>لورم</td>
                <td>13</td>
            </tr>
            <tr>
                <td>2</td>
                <td>لورم</td>
                <td>ایپسوم</td>
                <td>لورم</td>
                <td>17</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection