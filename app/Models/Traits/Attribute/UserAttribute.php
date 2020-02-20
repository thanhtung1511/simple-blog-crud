<?php

namespace App\Models\Traits\Attribute;

use Illuminate\Support\Facades\Hash;

/**
 * Trait UserAttribute.
 */
trait UserAttribute
{
    public function setPasswordAttribute($password): void
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        if (
            (\strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (\strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password))
        ) {
            $hash = $password;
        } else {
            $hash = Hash::make($password);
        }

        $this->attributes['password'] = $hash;
    }

    public function getFullNameAttribute(): ?string
    {
        return $this->last_name
            ? $this->first_name.' '.$this->last_name
            : $this->first_name;
    }

    public function getNameAttribute(): ?string
    {
        return $this->full_name;
    }

    public function getRolesLabelAttribute(): ?string
    {
        $roles = $this->getRoleNames()->toArray();

        if (\count($roles)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item);
            }, $roles));
        }

        return 'N/A';
    }

    public function getPermissionsLabelAttribute(): ?string
    {
        $permissions = $this->getDirectPermissions()->toArray();

        if (\count($permissions)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item['name']);
            }, $permissions));
        }

        return 'N/A';
    }

    public function getEmailChangedAttribute(): ?bool
    {
        return isset($this->attributes['email_changed']) ? $this->attributes['email_changed'] : false;
    }

    public function setEmailChangedAttribute(bool $changed): void
    {
        $this->email_changed = $changed;
    }
}
