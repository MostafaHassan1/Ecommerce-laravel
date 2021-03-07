<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Traits\shoppingcartTrait;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination, shoppingcartTrait;

    public $search;
    public $category_id;
    public $page_size = 12;
    public $sort_by = 'default';

    protected $queryString = ['search','category_id'];

    public function render()
    {
        $categories = Category::all();
        $products = Product::where('name','LIKE', '%'. $this->search .'%')->where('category_id',$this->category_id)->paginate();
        return view('livewire.search-component', compact('categories','products'))->layout('layouts.base');
    }
}
