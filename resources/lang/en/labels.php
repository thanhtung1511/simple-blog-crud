<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'copyright' => 'Copyright',
        'custom' => 'Custom',
        'actions' => 'Actions',
        'active' => 'Active',
        'buttons' => [
            'save' => 'Save',
            'update' => 'Update',
        ],
        'hide' => 'Hide',
        'inactive' => 'Inactive',
        'none' => 'None',
        'show' => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
        'create_new' => 'Create New',
        'toolbar_btn_groups' => 'Toolbar with button groups',
        'more' => 'More',
    ],

    'backend' => [
        'auth' => [
            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
            ],

            'users' => [
                'all' => 'All Users',
                'all_permissions' => 'All Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'management' => 'User Management',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',
                'user_actions' => 'User Actions',

                'table' => [
                    'created' => 'Created',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'abilities' => 'Abilities',
                    'roles' => 'Roles',
                    'total' => 'user total|users total',
                ],
                'tabs' => [
                    'content' => [
                        'overview' => [
                            'name' => 'Name',
                            'email' => 'Email',
                            'created_at' => 'Created At',
                            'last_updated' => 'Last Updated',
                        ],
                    ],
                    'titles' => [
                        'overview' => 'Overview'
                    ]
                ],

                'view' => 'View User',
            ],
        ],

        'blog' => [
            'posts' => [
                'all' => 'All Posts',
                'published' => 'Published Posts',
                'unpublished' => 'Unpublished Posts',
                'management' => 'Post Management',
                'post_actions' => 'Post Actions',

                'table' => [
                    'created' => 'Created',
                    'creator' => 'Creator',
                    'id' => 'ID',
                    'image' => 'Image',
                    'last_updated' => 'Last Updated',
                    'published' => 'Published',
                    'total' => 'post total|posts total',
                    'title' => 'Name',
                ],
            ]
        ]
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'dashboard' => [
            'recent_posts' => [
                'created_at' => 'Created At',
                'last_updated' => 'Last Updated',
                'published_at' => 'Published At'
            ],
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'update_password_button' => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'users' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],

        'blog' => [
            'posts' => [
                'all' => 'All My Posts',
                'create' => 'Create Post',
                'management' => 'Post Management',
                'post_actions' => 'Post Actions',
                'published' => 'Published Posts',
                'recent' => 'Recent Posts',
                'show' => [
                    'created_at' => 'Created At',
                    'last_updated' => 'Last Updated',
                ],
                'table' => [
                    'created' => 'Created',
                    'id' => 'ID',
                    'image' => 'Image',
                    'last_updated' => 'Last Updated',
                    'published' => 'Published',
                    'total' => 'post created|posts created',
                    'title' => 'Name',
                ],
                'unpublished' => 'Unpublished Posts',
                'view' => 'View Post',
                'update' => 'Update Post',
            ]
        ]
    ],
];
