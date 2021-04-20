<?php

namespace App\Http\Livewire;

use App\Traits\shoppingcartTrait;
use Livewire\Component;

class CartHeaderComponent extends Component
{
    use shoppingcartTrait;
    protected $listeners = [
        'refreshComponent' => '$refresh',
        'store' => 'store',
        'removeItem' => 'removeItem',
        'toggleWishlist' => 'toggleWishlist',
        'moveToCart' => 'moveToCart',
    ];
    public function render()
    {
        return view('livewire.cart-header-component');
    }
}
