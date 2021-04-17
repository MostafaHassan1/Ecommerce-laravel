<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders =  HomeSlider::whereStatus('1')->get();
        $latest_products = Product::latest()->limit(10)->get();
        return view('livewire.home-component', compact('sliders', 'latest_products'))->layout('layouts.base');
    }
}
