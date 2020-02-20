<?php

namespace App\Models\Traits\Relationship;

use App\Models\Auth\PasswordHistory;
use App\Models\Auth\SocialAccount;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}
