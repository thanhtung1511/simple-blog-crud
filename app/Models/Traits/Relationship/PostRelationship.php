<?php

namespace App\Models\Traits\Relationship;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PostRelationship.
 */
trait PostRelationship
{
    public function creator():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
