<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use App\Http\Livewire\PaginationComponent;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Storage;

class AdminHomeSliderComponent extends PaginationComponent
{
    public function deleteHomeSlider($homeSlider_id)
    {
        $homeSlider = homeSlider::findOrFail($homeSlider_id);
        Storage::disk('public')->delete($homeSlider->image);
        $homeSlider->delete();
        session()->flash('success', 'Home Slider has been deleted successfully');
    }
    public function render()
    {
        return view('livewire.admin.home-slider.admin-home-slider-component', ['sliders' => HomeSlider::paginate(10)])->layout('layouts.base');
    }
}
