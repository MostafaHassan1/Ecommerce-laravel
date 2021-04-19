<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartHeaderComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.cart-header-component');
    }
}
