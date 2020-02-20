<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">@lang('menus.frontend.blog.post.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item"
                   href="{{ route('frontend.blog.post.index') }}">@lang('menus.frontend.blog.post.all')</a>
                <a class="dropdown-item"
                   href="{{ route('frontend.blog.post.create') }}">@lang('menus.frontend.blog.post.create')</a>
            </div>
        </div><!--dropdown-->
    </div><!--btn-group-->
</li>
