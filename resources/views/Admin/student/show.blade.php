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
                @foreach($students as $student)
                    <tr>
                        <td>1</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->father_name }}</td>
                        <td>{{ $student->mother_name }}</td>
                        <td>
                            <form action="{{ route('students.destroy' , [ 'id' => $student->id ]) }}">
                                <a class="btn btn-info btn-xs"  href="{{ route( 'students.edit' , [ 'id' => $student->id ] ) }}">ویرایش</a>
                                <a class="btn btn-danger btn-xs">حذف</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection