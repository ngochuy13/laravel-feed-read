<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}">
                            <i class="ti-user"></i>
                            <p>Đăng nhập</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">
                            <i class="ti-pencil-alt"></i>
                            <p>Đăng kí</p>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('User.logout') }}">
                            <i class="ti-share"></i>
                            <p>Đăng xuất</p>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>