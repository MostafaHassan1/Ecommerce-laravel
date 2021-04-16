<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Livewire\PaginationComponent;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminProductsComponent extends PaginationComponent
{

    public function deleteProduct($product_id)
    {
        $product = Product::findOrFail($product_id);
        Storage::disk('public')->delete($product->image);
        $product->delete();
        session()->flash('success', 'Product has been Deleted successfully');
    }

    public function render()
    {
        return view(
            'livewire.admin.product.admin-products-component',
            ['products' => Product::with('category:id,name')->paginate(6)]
        )->layout('layouts.base');
    }
}
