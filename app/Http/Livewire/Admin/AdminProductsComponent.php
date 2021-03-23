<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\PaginationComponent;
use App\Models\Product;

class AdminProductsComponent extends PaginationComponent
{
    public function render()
    {

        return view(
            'livewire.admin.admin-products-component',
            ['products' => Product::with('category:id,name')->paginate(6)]
        )->layout('layouts.base');
    }
}
