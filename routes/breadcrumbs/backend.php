<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('messages.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/backend/auth.php';
require __DIR__.'/backend/blog.php';
