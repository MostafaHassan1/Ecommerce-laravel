<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public function render()
    {
        return view('livewire.header-search-component',['categories' => Category::all() ]);
    }
}
