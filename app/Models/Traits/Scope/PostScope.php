<?php

namespace App\Models\Traits\Scope;

/**
 * Trait PostScope.
 */
trait PostScope
{

    public function filterUpdatedAt($query, $ranges)
    {
        if (!empty($ranges['start_date'])) {
            $query->whereDate('updated_at', '>=', $ranges['start_date']);
        }
        if (!empty($ranges['end_date'])) {
            $query->whereDate('updated_at', '<=', $ranges['end_date']);
        }

        return $query;
    }

    public function filterPublished($query, $published)
    {
        if ($published != null) {
            $query->where('published', (bool)$published);
        }

        return $query;
    }
}
