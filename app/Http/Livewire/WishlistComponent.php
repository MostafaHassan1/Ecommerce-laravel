<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Cart;
use Livewire\Component;

class WishlistComponent extends Component
{
    public function render()
    {
        $products = Product::find(Cart::instance('wishlist')->content()->pluck('id'));
        return view('livewire.wishlist-component', compact('products'))->layout('layouts.base');
    }
}
