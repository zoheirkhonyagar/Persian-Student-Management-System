<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">نام پروژه</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">ورود</a></li>
                <li><a href="{{ route('register') }}">ثبت نام</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->first_name . Auth::user()->last_name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span>خروج</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <a class="btn btn-warning btn-xs" style="margin-top: 10px;padding: 5px 28px" href="{{ route('user.profile') }}">حساب کاربری</a>
            @endif
        </ul>
        {{--<div id="navbar" class="navbar-collapse collapse">--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li><a href="#">صفحه اصلی</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>
</nav>