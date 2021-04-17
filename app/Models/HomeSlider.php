<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomeSlider extends Model
{
    use HasFactory;

    protected $table = "home_sliders";


    public function setImageAttribute($file)
    {
        if (!isset($this->attributes['image'])) //first time to create and upload an image
            $this->attributes['image'] = $file->store('homeslider-images', 'public');
        else {
            Storage::disk('public')->delete($this->attributes['image']);
            $this->attributes['image'] = $file->store('homeslider-images', 'public');
        }
    }
}
