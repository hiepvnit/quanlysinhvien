<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
            <a href="/" class="navbar-brand"><span class="navbar-logo"></span> Vinanippon</a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if (Route::has('login'))
                @if (Auth::check())
                    <ul class="nav navbar-nav navbar-right visible-xs">
                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <span>{{Auth::user()->username}}</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li class="arrow"></li>
                                <li><a href="javascript:;">Cập nhật thông tin cá nhân</a></li>
                                <li><a href="javascript:;" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                </form>
                            </ul>
                        </li>
                    </ul>
                @endif
            @endif
        </div>
        <!-- end mobile sidebar expand / collapse button -->

        <!-- begin header navigation right -->
        @if (Route::has('login'))
            @if (Auth::check())
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <span>{{Auth::user()->username}}</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="javascript:;">Cập nhật thông tin cá nhân</a></li>
                            <li><a href="javascript:;" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            </form>
                        </ul>
                    </li>
                </ul>
            @endif
        @endif
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>