<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ \Request::route()->getName() == 'adminPanel' ? "active" : '' }}"><a href="/">صفحه اصلی</a></li>
        @if(auth()->user()->isSuperAdmin())
            <li class="{{ \Request::route()->getName() == 'register' ? "active" : '' }}"><a href="{{route('register')}}">ایجاد مدیر</a></li>
        @endif
        <li><a href="#">لورم ایپسوم</a></li>
        <li><a href="#">لورم ایپسوم</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="">لورم ایپسوم</a></li>
        <li><a href="">لورم ایپسوم</a></li>
        <li><a href="">لورم ایپسوم</a></li>
    </ul>
</div>
