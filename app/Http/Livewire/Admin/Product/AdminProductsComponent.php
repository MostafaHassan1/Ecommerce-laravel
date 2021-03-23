<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Livewire\PaginationComponent;
use App\Models\Product;

class AdminProductsComponent extends PaginationComponent
{
    public function render()
    {

        return view(
            'livewire.admin.product.admin-products-component',
            ['products' => Product::with('category:id,name')->paginate(6)]
        )->layout('layouts.base');
    }
}
