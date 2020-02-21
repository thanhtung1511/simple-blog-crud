<?php

namespace App\Models\Traits\Scope;

use Illuminate\Support\Str;

trait Filterable
{
    public function scopeFilter($query, $parameters)
    {
        foreach ($parameters as $field => $value) {
            $method = 'filter' . Str::studly($field);
//            dump(Str::studly($field));
            if (method_exists($this, $method)) {
//                dump($field);
                $this->{$method}($query, $value);
            }
        }

//        dd($parameters);

        return $query;
    }
}
