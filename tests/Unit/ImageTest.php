<?php

namespace Dealskoo\Image\Tests\Unit;

use Dealskoo\Image\Models\Image;
use Dealskoo\Image\Tests\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Dealskoo\Image\Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class ImageTest extends TestCase
{
    use RefreshDatabase;

    public function test_imaginable()
    {
        $product = new Product(['name' => 'test']);
        $product->save();
        $filename = 'test\1.png';
        $image = new Image(['filename' => $filename]);
        $product->images()->save($image);
        $product->refresh();
        $this->assertCount(1, $product->images);
    }

    public function test_name()
    {
        $filename = 'test\1.png';
        $image = new Image(['filename' => $filename]);
        $this->assertEquals(basename($filename), $image->name);
    }

    public function test_url()
    {
        $filename = 'test\1.png';
        $image = new Image(['filename' => $filename]);
        $this->assertEquals(Storage::url($filename), $image->url);
    }
}
