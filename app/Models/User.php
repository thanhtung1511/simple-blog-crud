<?php

namespace App\Models;

use App\Models\Traits\Attribute\UserAttribute;
use App\Models\Traits\Method\UserMethod;
use App\Models\Traits\Relationship\UserRelationship;
use DateTime;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property bool|null email_changed
 * @property Collection|Post[] posts
 */
class User extends Authenticatable
{
    use Notifiable,
        HasRoles,
        Impersonate,
        UserAttribute,
        UserMethod,
        UserRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
