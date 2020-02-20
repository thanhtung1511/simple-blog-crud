<?php

namespace App\Models\Traits\Method;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    public function isAdmin(): bool
    {
        return $this->hasRole(config('access.roles.admin'));
    }
}
