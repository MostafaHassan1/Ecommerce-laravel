<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Traits\shoppingcartTrait;

class ShopComponent extends PaginationComponent
{
    use shoppingcartTrait;

    public $page_size = 12;
    public $sort_by = 'default';
    public $category = NULL;
    public $range_1, $range_2;

    public function mount($slug = NULL)
    {
        if ($slug)
            $this->category = Category::whereSlug($slug)->first();
        $this->range_1 = 1;
        $this->range_2 = 1000;
    }

    public function render()
    {
        $categories = Category::all();
        $products = $this->apply_sort_by($this->sort_by)
            ->whereBetween('regular_price', [$this->range_1, $this->range_2])
            ->withCategory($this->category)
            ->paginate($this->page_size);
        return view('livewire.shop-component', compact('categories', 'products'))->layout('layouts.base');
    }

    public function apply_sort_by($sort)
    {
        $query = Product::query();
        switch ($sort) {
            case 'default':
                return $query;
                break;
            case 'date':
                return $query->orderBy('created_at', 'DESC');
                break;
            case 'price':
                return $query->orderBy('regular_price', 'ASC');
                break;
            case 'price-desc':
                return $query->orderBy('regular_price', 'DESC');
                break;
            default:
                return $query;
                break;
        }
    }
}
