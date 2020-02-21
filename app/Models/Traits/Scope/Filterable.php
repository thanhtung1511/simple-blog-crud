<?php

namespace App\Models\Traits\Scope;

use Illuminate\Support\Str;

trait Filterable
{
    public function scopeFilter($query, $parameters)
    {
        if (\is_array($parameters)) {
            foreach ($parameters as $field => $value) {
                $method = 'filter' . Str::studly($field);
                if (method_exists($this, $method)) {
                    $this->{$method}($query, $value);
                }
            }
        }

        return $query;
    }
}
