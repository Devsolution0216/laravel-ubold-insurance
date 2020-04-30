<!-- Topbar Start -->
<div class="navbar-custom">
    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ url('/') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ url('assets/images/logo.png') }}" alt="" height="57">
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="{{ url('assets/images/logo-sm.png') }}" alt="" height="57">
            </span>
        </a>
    </div>
    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>


        <!-- avatar menu -->
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ url('assets/images/users/avatar.png') }}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        {{ auth()->user()->name }} 
                        <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <a href="#logout" class="dropdown-item notify-item" onclick="$('#logout').submit();">
                        <i class="fe-log-out"></i>
                        <span>@lang('menus.logout')</span>
                    </a>
                </div>
            </li>
        </ul>
    </ul>
</div>




