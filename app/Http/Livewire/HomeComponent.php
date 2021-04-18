<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders =  HomeSlider::whereStatus('1')->get();
        $latest_products = Product::latest()->limit(10)->get();
        $insale_products = Product::where('sale_price', '>', 0)->inRandomOrder()->limit(10)->get();
        $random_categories = Category::homeCategories()->get();
        $sale = Sale::first();
        return view('livewire.home-component', compact('sliders', 'latest_products', 'random_categories', 'insale_products', 'sale'))->layout('layouts.base');
    }
}
