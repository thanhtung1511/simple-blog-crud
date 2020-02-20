<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'roles' => [
            'already_exists' => 'That role already exists. Please choose a different name.',
            'cant_delete_admin' => 'You can not delete the Administrator role.',
            'create_error' => 'There was a problem creating this role. Please try again.',
            'delete_error' => 'There was a problem deleting this role. Please try again.',
            'has_users' => 'You can not delete a role with associated users.',
            'needs_permission' => 'You must select at least one permission for this role.',
            'not_found' => 'That role does not exist.',
            'update_error' => 'There was a problem updating this role. Please try again.',
        ],
        'permissions' => [
            'already_exists' => 'That permission already exists. Please choose a different name.',
            'create_error' => 'There was a problem creating this permission. Please try again.',
            'delete_error' => 'There was a problem deleting this permission. Please try again.',
            'has_users' => 'You can not delete a permission with associated users.',
            'not_found' => 'That permission does not exist.',
            'update_error' => 'There was a problem updating this permission. Please try again.',
        ],
        'users' => [
            'cant_delete_admin' => 'You can not delete the super administrator.',
            'cant_delete_self' => 'You can not delete yourself.',
            'cant_restore' => 'This user is not deleted so it can not be restored.',
            'create_failed' => 'There was a problem creating this user. Please try again.',
            'delete_failed' => 'There was a problem deleting this user. Please try again.',
            'delete_first' => 'This user must be deleted first before it can be destroyed permanently.',
            'email_failed' => 'That email address belongs to a different user.',
            'not_found' => 'That user does not exist.',
            'restore_failed' => 'There was a problem restoring this user. Please try again.',
            'role_needed_create' => 'You must choose at lease one role.',
            'role_needed' => 'You must choose at least one role.',
            'update_failed' => 'There was a problem updating this user. Please try again.',
            'update_password_failed' => 'There was a problem changing this users password. Please try again.',
        ],
    ],

    'frontend' => [
        'auth' => [
            'deactivated' => 'Your account has been deactivated.',
            'email_taken' => 'That e-mail address is already taken.',

            'password' => [
                'change_mismatch' => 'That is not your old password.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
