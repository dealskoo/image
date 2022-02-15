<?php

namespace Dealskoo\Image\Events;

use Dealskoo\Image\Models\Image;

class Event
{
    public $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }
}
