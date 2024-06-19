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
                        <a href="{{route('admin.dashboard')}}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span
                                class="menu-text">Dashboard</span></a>
                    </li><!-- /.menu-item -->

                    <li class="menu-item has-child @yield('open-slider-management')">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span
                                class="menu-text">Slider Management</span> </a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item @yield('active-slider')">
                                <a href="{{route('admin.slider.index')}}" class="menu-link">Slider</a>
                            </li>
                        </ul>
                    </li><!-- /.menu-item -->

                    <li class="menu-item has-child @yield('open-category-management')">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span
                                    class="menu-text">Category Management</span> </a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item @yield('active-category')">
                                <a href="{{route('admin.category.index')}}" class="menu-link">Category</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item has-child @yield('open-brand-management')">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span
                                    class="menu-text">Brand Management</span> </a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item @yield('active-brand')">
                                <a href="{{route('admin.brand.index')}}" class="menu-link">Brand</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item has-child @yield('open-occasion-management')">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-browser"></span> <span
                                    class="menu-text">Occasion Management</span> </a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item @yield('active-occasion')">
                                <a href="{{route('admin.occasion.index')}}" class="menu-link">Occasion</a>
                            </li>
                        </ul>
                    </li>
{{--                     Support Management --}}
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
{{--                     admin Management --}}
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
