<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.admin-category-component',['categories'=> Category::paginate(5)])->layout('layouts.base');
    }
}
