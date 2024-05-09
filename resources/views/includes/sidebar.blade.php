<!-- BEGIN: sidebar-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mx-auto">
                <a class="navbar-brand" href="../../../html/rtl/vertical-menu-template/index.html">
                    <div class="brand-logo">
                        <div class="logo">
                            <img src="{{ asset('assets/images/chat.png') }}" alt="chat">
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item nav-toggle bg-success">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <span>x</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span data-i18n="Apps &amp; Pages">الصفحات</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item active">
                <a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span class="menu-title text-truncate">
                        <h3>الرئيسية</h3>
                    </span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.members.all') }}">
                    <i class="fa fa-user"></i>
                    <span class="menu-title text-truncate">
                        إدارة الأعضاء
                    </span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.room.index') }}">
                    <i class="fa fa-user-group"></i>
                    <span class="menu-title text-truncate">
                        إدارة المجموعات
                    </span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.room.Requests') }}">
                    <i class="fa fa-user-plus"></i>
                    <span class="menu-title text-truncate">
                        إدارة الطلبات
                    </span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.guest.index') }}">
                    <i class="fa fa-user-plus"></i>
                    <span class="menu-title text-truncate">
                        إدارة ضيوف الدردشة العامة
                    </span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.bot.index') }}">
                    <i class="fas fa-robot"></i>
                    <span class="menu-title text-truncate">
                        شات بوت
                    </span>
                </a>
            </li>
            
        </ul>
    </div>
</div>
<!-- END: sidebar --> 