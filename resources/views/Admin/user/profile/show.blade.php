@extends('Admin.master')

@section('content')

    <h1 class="page-header">ویرایش اطلاعات کاربری :</h1>

    <div class="row placeholders col-md-4" style="text-align: right">
        <form class="form-horizontal" method="POST" action="{{ route('user.profile.update' , ['user' => auth()->user()]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="col-md-3 control-label" style="text-align: right">نام :</label>

                <div class="col-md-7">
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="col-md-3 control-label" style="text-align: right">نام خانوادگی :</label>

                <div class="col-md-7">
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('national_number') ? ' has-error' : '' }}">
                <label for="national_number" class="col-md-3 control-label" style="text-align: right">کد ملی :</label>

                <div class="col-md-7">
                    <input id="national_number" type="text" class="form-control" name="national_number" value="{{ $user->national_number }}" required autofocus>

                    @if ($errors->has('national_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('national_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image" class="col-md-3 control-label" style="text-align: right">تصویر کاربر :</label>

                <div class="col-md-7">
                    <input type="file" id="image" class="form-control" name="image" value="{{ old('image') }}" autofocus>

                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-3 control-label" style="text-align: right">رمز عبور :</label>

                <div class="col-md-7">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-3 control-label" style="text-align: right">تکرار رمز عبور :</label>

                <div class="col-md-7">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                     بروزرسانی
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
