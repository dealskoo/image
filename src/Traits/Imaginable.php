<?php

namespace Dealskoo\Image\Traits;

use Dealskoo\Image\Models\Image;

trait Imaginable
{
    public function images()
    {
        return $this->morphMany(Image::class, 'imaginable');
    }

    public function cover()
    {
        return $this->images()->first();
    }

    public function getCoverAttribute()
    {
        return $this->cover();
    }
}
