<?php

namespace Dealskoo\Image\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Deleted extends Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
