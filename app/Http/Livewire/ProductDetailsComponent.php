<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use App\Traits\shoppingcartTrait;

class ProductDetailsComponent extends Component
{
    use shoppingcartTrait;

    public $slug;
    public $qty;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function passToCartStore($product_id, $product_name, $product_price)
    {
        $this->store($product_id, $product_name, $this->qty, $product_price, 'cart');
    }
    public function render()
    {
        $product = Product::whereSlug($this->slug)->first();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(8)->get();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $sale = Sale::first();
        return view('livewire.product-details-component', compact('product', 'related_products', 'popular_products', 'sale'))->layout('layouts.base');
    }
}
