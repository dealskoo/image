<?php

namespace Dealskoo\Image\Models;

use Dealskoo\Image\Events\Deleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $appends = [
        'name',
        'url'
    ];

    protected $fillable = [
        'filename'
    ];

    protected $dispatchesEvents = [
        'deleted' => Deleted::class
    ];

    public function imaginable()
    {
        return $this->morphTo();
    }

    public function getNameAttribute()
    {
        return basename($this->filename);
    }

    public function getUrlAttribute()
    {
        return Storage::url($this->filename);
    }
}
