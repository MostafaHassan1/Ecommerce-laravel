<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use App\Http\Livewire\PaginationComponent;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends PaginationComponent
{
    public function render()
    {
        return view('livewire.admin.home-slider.admin-home-slider-component', ['sliders' => HomeSlider::paginate(10)])->layout('layouts.base');
    }
}
