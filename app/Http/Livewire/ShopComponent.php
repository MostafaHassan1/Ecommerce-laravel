<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\shoppingcartTrait;
class ShopComponent extends Component
{   
    use WithPagination, shoppingcartTrait;

    public $page_size = 12;
    public $sort_by = 'default';

    public function render()
    {
        $products = $this->apply_sort_by($this->sort_by)->paginate($this->page_size); 
        return view('livewire.shop-component', ['products' => $products])->layout('layouts.base');
    }

    public function apply_sort_by($sort)
    {
        $query = Product::query();
        switch ($sort) {
            case 'default':
                return $query;  
                break;
            case 'date': 
                return $query->orderBy('created_at','DESC');
                break;
            case 'price': 
                return $query->orderBy('regular_price','ASC');
                break;    
            case 'price-desc': 
                return $query->orderBy('regular_price','DESC');
                break;
            default:
                return $query;
                break;
        }
    }
}
