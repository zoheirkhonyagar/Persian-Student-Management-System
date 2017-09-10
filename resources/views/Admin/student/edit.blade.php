@extends('Admin.master')
@section('content')
    <h1 class="page-header">ثبت نام دانش آموز :</h1>
    <div class="row placeholders col-md-4" style="text-align: right">
        <form class="form-horizontal" method="POST" action="{{ route('students.update' , [ 'id' => $student->id]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="col-md-3 control-label" style="text-align: right">نام :</label>

                <div class="col-md-7">
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $student->first_name }}" required autofocus>

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
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $student->last_name }}" required autofocus>

                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="sex" class="col-md-3 control-label" style="text-align: right">جنسیت :</label>
                <div class="col-md-7">
                    <select name="sex" class="form-control" id="sex">
                        <option value="زن" {{ $student->sex == 'زن' ? 'selected' : '' }}>زن</option>
                        <option value="مرد" {{ $student->sex == 'مرد' ? 'selected' : '' }}>مرد</option>
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('national_number') ? ' has-error' : '' }}">
                <label for="national_number" class="col-md-3 control-label" style="text-align: right">کد ملی :</label>

                <div class="col-md-7">
                    <input id="national_number" type="text" class="form-control" name="national_number" value="{{ $student->national_number }}" required autofocus>

                    @if ($errors->has('national_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('national_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" style="text-align: right">تاریخ تولد :</label>
                <div class="col-md-7">
                    <label for="day">روز</label>
                    <select name="day" class="form-inline" id="day">
                        @for( $i=1 ; $i <= 31 ; $i++ )
                            <option value="{{ $i }}" {{ jdate($student->birthday)->format('%d') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <label for="month">ماه</label>
                    <select name="month" class="form-inline" id="month">
                        @foreach($months as $key => $value)
                            <option value="{{ $key }}" {{ jdate($student->birthday)->format('%B') == $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <label for="year">سال</label>
                    <select name="year" class="form-inline" id="year">
                        @for($i = $year ; $i >= $year-50 ; $i--)
                            <option value="{{ $i }}" {{ jdate($student->birthday)->format('%Y') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('father_name') ? ' has-error' : '' }}">
                <label for="father_name" class="col-md-3 control-label" style="text-align: right">نام پدر :</label>

                <div class="col-md-7">
                    <input id="father_name" type="text" class="form-control" name="father_name" value="{{ $student->father_name }}" autofocus>

                    @if ($errors->has('father_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('father_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('father_job') ? ' has-error' : '' }}">
                <label for="father_job" class="col-md-3 control-label" style="text-align: right">شغل پدر :</label>

                <div class="col-md-7">
                    <input id="father_job" type="text" class="form-control" name="father_job" value="{{ $student->father_job }}" autofocus>

                    @if ($errors->has('father_job'))
                        <span class="help-block">
                            <strong>{{ $errors->first('father_job') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('mother_name') ? ' has-error' : '' }}">
                <label for="mother_name" class="col-md-3 control-label" style="text-align: right">نام مادر :</label>

                <div class="col-md-7">
                    <input id="mother_name" type="text" class="form-control" name="mother_name" value="{{ $student->mother_name }}" autofocus>

                    @if ($errors->has('mother_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mother_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('mother_job') ? ' has-error' : '' }}">
                <label for="mother_job" class="col-md-3 control-label" style="text-align: right">شغل مادر :</label>

                <div class="col-md-7">
                    <input id="mother_job" type="text" class="form-control" name="mother_job" value="{{ $student->mother_job }}" autofocus>

                    @if ($errors->has('mother_job'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mother_job') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="col-md-3 control-label" style="text-align: right">آدرس :</label>

                <div class="col-md-7">
                    <textarea id="address" class="form-control" name="address">{{ $student->address }}</textarea>
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('family_count') ? ' has-error' : '' }}">
                <label for="family_count" class="col-md-3 control-label" style="text-align: right">تعداد اعضای خانواده :</label>

                <div class="col-md-7">
                    <input id="family_count" type="text" class="form-control" name="family_count" value="{{ $student->family_count }}" required autofocus>

                    @if ($errors->has('family_count'))
                        <span class="help-block">
                            <strong>{{ $errors->first('family_count') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('student_count') ? ' has-error' : '' }}">
                <label for="student_count" class="col-md-3 control-label" style="text-align: right">چندمین فرزند خانواده :</label>

                <div class="col-md-7">
                    <input id="student_count" type="text" class="form-control" name="student_count" value="{{ $student->student_count }}" required autofocus>

                    @if ($errors->has('student_count'))
                        <span class="help-block">
                            <strong>{{ $errors->first('student_count') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image" class="col-md-3 control-label" style="text-align: right">تصویر دانش آموز :</label>

                <div class="col-md-7">
                    <input type="file" id="image" class="form-control" name="image" value="" autofocus>

                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        بروز رسانی
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection