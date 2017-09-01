@extends('Admin.master')

@section('content')

    <h1 class="page-header">اطلاعات کاربری :</h1>

    <div class="row">
        <div class="media">
            <div class="media-left media-middle">
                <a href="#">
                    <img alt="64x64" class="media-object" src="{{ $user->image != null ? "/" .$user->image['thumb'] : "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" }}" class="img-responsive" data-holder-rendered="true" style="width: 200px;border-radius: 50%;">
                </a>
            </div>
            <div class="media-body media-middle">
                <h4 style="margin:30px;">نام :
                    <span>{{ $user->first_name }}</span>
                </h4>
                <h4 style="margin:30px;">نام خانوادگی :
                    <span>{{ $user->last_name }}</span>
                </h4>
                <h4 style="margin:30px;">کد ملی :
                    <span>{{ $user->national_number }}</span>
                </h4>
                <a class="btn btn-primary" href="{{ route('users.edit', [ 'id' => $user->id ]) }}">ویرایش اطلاعات</a>
            </div>
        </div>
    </div>

@endsection
