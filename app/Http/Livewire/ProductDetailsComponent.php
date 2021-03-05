<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Traits\shoppingcartTrait;

class ProductDetailsComponent extends Component
{   
    use shoppingcartTrait;
    
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::whereSlug($this->slug)->first();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(8)->get();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.product-details-component', compact('product','related_products','popular_products'))->layout('layouts.base');
    }
}
