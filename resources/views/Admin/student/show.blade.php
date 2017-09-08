@extends('Admin.master')
@section('custom-styles')
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <style>
        .media-middle {
            vertical-align: top;
        }
        .media-body, .media-left, .media-right {
            display: block;
            vertical-align: top;
        }
        h5{
            font-size: 16px;
        }
    </style>
@endsection
@section('content')
    <h1 class="page-header">اطلاعات دانش آموز :</h1>

    <div class="row">
        <div class="media">
            <div class="media-left media-middle">
                <a href="#">
                    <img alt="64x64" class="media-object" src="{{ $student->image != null ? "/" .$student->image['thumb'] : "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" }}" class="img-responsive" data-holder-rendered="true" style="width: 200px;height:200px;border-radius: 50%;">
                </a>
            </div>
            <div class="media-body media-middle">
                <h5 style="margin:20px 0;">نام :
                    <span>{{ $student->first_name }}</span>
                </h5>
                <h5 style="margin:20px 0;">نام خانوادگی :
                    <span>{{ $student->last_name }}</span>
                </h5>
                <h5 style="margin:20px 0;">جنسیت :
                    <span>{{ $student->sex }}</span>
                </h5>
                <h5 style="margin:20px 0;">کد ملی :
                    <span>{{ $student->national_number }}</span>
                </h5>
                <h5 style="margin:20px 0;">تاریخ تولد :
                    <span>{{ jdate($student->birthday)->format("%d %B %Y") }}</span>
                </h5>
                <h5 style="margin:20px 0;">نام پدر :
                    <span>{{ $student->father_name }}</span>
                </h5>
                <h5 style="margin:20px 0;">شغل پدر :
                    <span>{{ $student->father_job }}</span>
                </h5>
                <h5 style="margin:20px 0;">نام مادر :
                    <span>{{ $student->mother_name }}</span>
                </h5>
                <h5 style="margin:20px 0;">شغل مادر :
                    <span>{{ $student->mother_job }}</span>
                </h5>
                <h5 style="margin:20px 0;">آدرس :
                    <span>{{ $student->address }}</span>
                </h5>
                <h5 style="margin:20px 0;">تعداد اعضای خانواده :
                    <span>{{ $student->family_count }}</span>
                </h5>
                <h5 style="margin:20px 0;">چندمین فرزند خانواده :
                    <span>{{ $student->student_count }}</span>
                </h5>
                <h5 style="margin:20px 0;">مدیر ثبت نام کننده :
                    <span>{{ $student->user->first_name . $student->user->last_name }}</span>
                </h5>
                <h5 style="margin:20px 0;">تاریخ ثبت نام :
                    <span>{{ jdate($student->created_at)->format("%d %B %Y") }}</span>
                </h5>
                <a class="btn btn-primary" href="{{ route('users.edit', [ 'id' => $student->id ]) }}">ویرایش اطلاعات</a>
            </div>
        </div>
    </div>
@endsection