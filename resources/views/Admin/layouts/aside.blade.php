<!-- .app-aside -->
<aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
        <!-- .aside-header -->
        <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span
                    class="user-avatar user-avatar-lg"><img src="{{asset('assets/images/avatars/profile.jpg')}}" alt=""></span>
                <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span
                    class="account-summary"><span class="account-name">Beni Arisandi</span> <span
                        class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <!-- dropdown-items -->
                <div class="pb-3">
                    <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span>
                        Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span
                            class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a
                        class="dropdown-item" href="#">Keyboard Shortcuts</a>
                </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
        </header><!-- /.aside-header -->
        <!-- .aside-menu -->
        <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
                <!-- .menu -->
                <ul class="menu">
                    <!-- .menu-item -->
                    <li class="menu-item @yield('active-dashboard')">
                        <a href="" class="menu-link"><span class="menu-icon fas fa-home"></span> <span
                                class="menu-text">Dashboard</span></a>
                    </li><!-- /.menu-item -->
{{--                    --}}{{-- User Authentication --}}
{{--                    <li class="menu-item has-child @yield('open-user-management')">--}}
{{--                        <a href="#" class="menu-link"><span class="menu-icon oi oi-person"></span> <span--}}
{{--                                class="menu-text">User Management</span></a> <!-- child menu -->--}}
{{--                        <ul class="menu">--}}
{{--                            @if(auth()->guard('admin')->user())--}}

{{--                                <li class="menu-item @yield('active-user-management')">--}}
{{--                                    <a href="{{route('admins.management.admins.index')}}" class="menu-link">Mangers--}}
{{--                                        Management</a>--}}
{{--                                </li>--}}
{{--                            @else--}}
{{--                                <li class="menu-item">--}}
{{--                                    <a href="user-profile.html" class="menu-link">Login</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}


{{--                        </ul><!-- /child menu -->--}}
{{--                    </li><!-- /.menu-item -->--}}
{{--                    --}}{{-- Creator Management --}}
{{--                    <li class="menu-item has-child @yield('open-creator-management')">--}}
{{--                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span--}}
{{--                                class="menu-text">Creator Management</span> </a> <!-- child menu -->--}}
{{--                        <ul class="menu">--}}
{{--                            <li class="menu-item @yield('active-category')">--}}
{{--                                <a href="{{route('admins.category.index')}}" class="menu-link">Category Management</a>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item @yield('active-blog')">--}}
{{--                                <a href="{{route('admins.blog.index')}}" class="menu-link">Blog Management</a>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item @yield('active-projects')">--}}
{{--                                <a href="{{route('admins.project.index')}}" class="menu-link">Portfolio</a>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item @yield('active-page')">--}}
{{--                                <a href="{{route('admins.page.index')}}" class="menu-link">Page Management</a>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item @yield('active-service')">--}}
{{--                                <a href="{{route('admins.service.index')}}" class="menu-link">Service Management</a>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item @yield('active-client')">--}}
{{--                                <a href="{{route('admins.client.index')}}" class="menu-link">Client Management</a>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item @yield('active-slider')">--}}
{{--                                <a href="{{route('admins.slider.index')}}" class="menu-link">Slider Management</a>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item @yield('active-contact')">--}}
{{--                                <a href="{{route('admins.contact.index')}}" class="menu-link">Contact Management</a>--}}
{{--                            </li>--}}
{{--                        </ul><!-- /child menu -->--}}
{{--                    </li><!-- /.menu-item -->--}}
{{--                    --}}{{-- Support Management --}}
{{--                    <li class="menu-item has-child @yield('open-support-management')">--}}
{{--                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span--}}
{{--                                class="menu-text">Support Management</span> </a> <!-- child menu -->--}}
{{--                        <ul class="menu">--}}
{{--                            <li class="menu-item @yield('active-department')">--}}
{{--                                <a href="{{route('admins.department.index')}}" class="menu-link">Department Management</a>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item @yield('active-ticket')">--}}
{{--                                <a href="{{route('admins.blog.index')}}" class="menu-link">Ticket Management</a>--}}
{{--                            </li>--}}
{{--                        </ul><!-- /child menu -->--}}
{{--                    </li>--}}
{{--                    @admin--}}
{{--                    --}}{{-- Admin Management --}}
{{--                    <li class="menu-item has-child @yield('open-support-management')">--}}
{{--                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span--}}
{{--                                class="menu-text">Dashboard Settings</span> </a> <!-- child menu -->--}}
{{--                        <ul class="menu">--}}
{{--                            <li class="menu-item ">--}}
{{--                                <a href="{{route('translation')}}" class="menu-link">Dashboard Translations</a>--}}
{{--                            </li>--}}

{{--                        </ul><!-- /child menu -->--}}
{{--                    </li>--}}
{{--                    @endadmin--}}
{{--                    <!-- /.menu-item -->--}}









                </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
        </div><!-- /.aside-menu -->
        <!-- Skin changer -->
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span>
                <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
</aside><!-- /.app-aside -->
