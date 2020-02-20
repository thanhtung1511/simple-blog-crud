<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">@lang('menus.backend.auth.user.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item"
                   href="{{ route('admin.auth.user.index') }}">@lang('menus.backend.auth.users.all')</a>
                <a class="dropdown-item"
                   href="{{ route('admin.auth.user.create') }}">@lang('menus.backend.auth.users.create')</a>
            </div>
        </div><!--dropdown-->
    </div><!--btn-group-->
</li>
