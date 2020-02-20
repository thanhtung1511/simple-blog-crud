<?php

namespace App\Models\Traits\Method;

use Illuminate\Support\Facades\Storage;

/**
 * Trait PostMethod.
 */
trait PostMethod
{

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getImageLink(): ?string
    {
        if (empty($this->image)) {
            return null;
        }
        return Storage::url($this->image);
    }

    public function getDefaultImageLink(): string
    {
        return config('blog.post.default_image');
    }
}
