<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\PaginationComponent;
use App\Models\Category;

class AdminCategoryComponent extends PaginationComponent
{
    public function render()
    {
        return view('livewire.admin.admin-category-component',['categories'=> Category::paginate(5)])->layout('layouts.base');
    }
}
