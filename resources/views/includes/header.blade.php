<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex align-items-center content">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
        </ul>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex">
                        @if (auth('member')->check())
                            <span class="user-name fw-bolder">{{ auth('member')->user()->name }}</span>
                            <span class="user-status">طالب</span>
                        @else
                            <span class="user-name fw-bolder">{{ auth('web')->user()->name }}</span>
                            <span class="user-status">أدمن</span>
                        @endif
                    </div>
                    <span class="avatar">
                        @if (auth('web')->check())
                            @if (auth('web')->user()->profileImg !== null)
                                <img class="round" src="{{ asset('/' . auth('web')->user()->profileImg) }}" alt="avatar" height="40" width="40">                            
                            @else     
                                <i class="fa fa-user fa-2x"></i>
                            @endif
                        @else 
                            @if (auth('member')->user()->profileImg !== null)
                                <img class="round" src="{{ asset('/' . auth('member')->user()->profileImg) }}" alt="avatar" height="40" width="40">                            
                            @else     
                                <i class="fa fa-user"></i>
                            @endif
                        @endif
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        @if (auth('member')->check())
                            <a class="dropdown-item" href="{{ route('m.profile.edit') }}">
                                <i class="me-50" data-feather="settings"></i>
                                 ملفك الشخصي
                            </a>
                        @else   
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="me-50" data-feather="settings"></i>
                                 ملفك الشخصي
                            </a>
                        @endif

                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="me-50" data-feather="power"></i> 
                            تسجيل الخروج
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            @if (auth('member')->check())
                                <input type="hidden" value="member" name="usertype">
                            @else     
                                <input type="hidden" value="web" name="usertype">
                            @endif
                        </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->    