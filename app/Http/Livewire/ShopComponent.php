<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\shoppingcartTrait;
class ShopComponent extends Component
{   
    use WithPagination, shoppingcartTrait;
    public function render()
    {
        $products = Product::paginate(12); 
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.base');
    }
}
