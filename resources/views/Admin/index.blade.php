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
                <th>جنسیت</th>
                <th>نام پدر</th>
                <th>نام مادر</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->sex }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $student->mother_name }}</td>
                    <td>
                        <form action="{{ route('students.destroy' , [ 'id' => $student->id ]) }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <a class="btn btn-primary btn-xs"  href="{{ route( 'students.show' , [ 'id' => $student->id ] ) }}">نمایش مشخصات</a>
                            <a class="btn btn-info btn-xs"  href="{{ route( 'students.edit' , [ 'id' => $student->id ] ) }}">ویرایش</a>
                            <button type="submit" class="btn btn-danger btn-xs">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection