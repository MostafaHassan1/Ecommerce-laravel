<?php

namespace App\Http\Livewire;

use App\Traits\shoppingcartTrait;
use Livewire\Component;

class CartComponent extends Component
{
    use shoppingcartTrait;
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
