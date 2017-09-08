<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ \Request::route()->getName() == 'admin.panel' ? "active" : '' }}"><a href="/">صفحه اصلی</a></li>
    </ul>
    @if(auth()->user()->isSuperAdmin())
    <ul class="nav nav-sidebar">
        <h4 class="sidebar-h4">مدیریت</h4>

            <li class="{{ \Request::route()->getName() == 'register' ? "active" : '' }}"><a href="{{route('register')}}">ایجاد مدیر</a></li>

        <li><a href="#">لیست مدیران</a></li>
    </ul>
    @endif
    <ul class="nav nav-sidebar">
        <h4 class="sidebar-h4">دانش آموزان</h4>
        <li><a href="{{ route('students.create') }}">ثبت نام</a></li>
        <li><a href="{{ route('students.index') }}">لیست دانش آموزان</a></li>
    </ul>
</div>
