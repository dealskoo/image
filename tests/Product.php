<?php

namespace Dealskoo\Image\Tests;

use Dealskoo\Image\Traits\Imaginable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Imaginable;

    protected $fillable = ['name'];
}
