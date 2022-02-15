<?php

namespace Dealskoo\Image\Tests\Feature;

use Dealskoo\Image\Events\Deleted;
use Dealskoo\Image\Listeners\ImageDeleted;
use Dealskoo\Image\Models\Image;
use Dealskoo\Image\Tests\Post;
use Dealskoo\Image\Tests\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Dealskoo\Image\Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

class ImageTest extends TestCase
{
    use RefreshDatabase;

    public function test_basic_features()
    {
        $product = new Product(['name' => 'test']);
        $product->save();
        $filename = 'test\1.png';
        $image = new Image(['filename' => $filename]);
        $product->images()->save($image);
        $product->refresh();
        $this->assertCount(1, $product->images);
        $this->assertEquals($image->url, $product->cover->url);

        $post = new Post(['title' => 'test']);
        $post->save();
        $filename = 'test\2.png';
        $image = new Image(['filename' => $filename]);
        $post->images()->save($image);
        $post->refresh();
        $this->assertCount(1, $post->images);
        $this->assertCount(2, Image::all());
        $this->assertEquals($image->url, $post->cover->url);
    }

    public function test_image_delete_event()
    {
        Event::fake();
        $post = new Post(['title' => 'test']);
        $post->save();
        $filename = 'test\2.png';
        $image = new Image(['filename' => $filename]);
        $post->images()->save($image);
        $image->delete();
        Event::assertDispatched(Deleted::class);
    }

    public function test_image_delete_listener()
    {
        Storage::fake();
        $post = new Post(['title' => 'test']);
        $post->save();
        $filename = '2.png';
        Storage::put($filename, 'hello');
        Storage::assertExists($filename);
        $image = new Image(['filename' => $filename]);
        $post->images()->save($image);
        $listener = new ImageDeleted();
        $listener->handle(new Deleted($image));
        $this->assertFalse(Storage::exists($filename));
    }
}
