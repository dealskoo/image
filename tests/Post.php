<?php

namespace Dealskoo\Image\Tests;

use Dealskoo\Image\Traits\Imaginable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Imaginable;

    protected $fillable = ['title'];
}
