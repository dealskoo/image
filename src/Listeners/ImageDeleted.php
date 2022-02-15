<?php

namespace Dealskoo\Image\Listeners;

use Dealskoo\Image\Events\Deleted;
use Illuminate\Support\Facades\Storage;

class ImageDeleted
{
    public function handle(Deleted $event)
    {
        Storage::delete($event->image->filename);
    }
}
