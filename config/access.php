<?php

return [

    // Whether or not registration is enabled
    'registration' => env('ENABLE_REGISTRATION', true),

    // Configurations for the user
    'users' => [
        // Whether or not the user has to confirm their email when signing up
        'confirm_email' => env('CONFIRM_EMAIL', false),

        // Whether or not the users email can be changed on the edit profile screen
        'change_email' => env('CHANGE_EMAIL', false),

        // Login username to be used by the controller.
        'username' => 'email',

        // Whether or not the users password can be changed on the edit profile screen
        'change_password' => env('CHANGE_PASSWORD', false),
    ],

    // Configuration for the roles
    'roles'=>[
        'admin' => 'ADMIN',
        'default' => 'USER',
    ],

    'permissions'=> [
        'view_backend' => 'View backend',
    ],
];
