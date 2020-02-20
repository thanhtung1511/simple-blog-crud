<?php

Breadcrumbs::for('admin.blog.post.index', function ($trail) {
    $trail->push(__('menus.backend.blog.posts.management'), route('admin.blog.post.index'));
});

Breadcrumbs::for('admin.blog.post.unpublish', function ($trail) {
    $trail->parent('admin.blog.post.index');
    $trail->push(__('menus.backend.blog.posts.deactivated'), route('admin.auth.user.deactivated'));
});
Breadcrumbs::for('admin.blog.post.publish', function ($trail) {
    $trail->parent('admin.blog.post.index');
    $trail->push(__('menus.backend.blog.posts.deactivated'), route('admin.auth.user.deactivated'));
});
