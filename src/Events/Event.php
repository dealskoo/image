<?php

namespace Dealskoo\Image\Events;

use Dealskoo\Image\Models\Image;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }
}
