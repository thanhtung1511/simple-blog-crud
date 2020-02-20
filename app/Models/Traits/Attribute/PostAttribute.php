<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait PostAttribute.
 */
trait PostAttribute
{
    /**
     * @return string|null
     */
    public function getImageLinkAttribute()
    {
        return $this->getImageLink();
    }

    /**
     * @return string
     */
    public function getDefaultImageLinkAttribute()
    {
        return $this->getDefaultImageLink();
    }
}
