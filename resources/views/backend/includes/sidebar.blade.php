<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{ active_class(Route::is('admin/dashboard')) }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-title">
                    @lang('menus.backend.sidebar.system')
                </li>

                <li class="nav-item nav-dropdown {{ active_class(Route::is('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Route::is('admin/auth*')) }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.auth.title')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Route::is('admin/auth/user*')) }}"
                               href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.auth.users.management')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Route::is('admin/auth/role*')) }}"
                               href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.auth.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown {{ active_class(Route::is('admin/blog*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Route::is('admin/blog*')) }}" href="#">
                        <i class="nav-icon far fa-newspaper"></i>
                        @lang('menus.backend.blog.title')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Route::is('admin/auth/user*')) }}"
                               href="{{ route('admin.blog.post.index') }}">
                                @lang('labels.backend.blog.posts.management')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
