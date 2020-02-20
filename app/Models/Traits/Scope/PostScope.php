<?php

namespace App\Models\Traits\Scope;

/**
 * Trait PostScope.
 */
trait PostScope
{
    public function scopePublished($query, bool $published = true)
    {
        return $query->where('active', $published);
    }
}
