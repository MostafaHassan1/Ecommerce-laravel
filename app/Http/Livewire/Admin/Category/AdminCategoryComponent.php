<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Livewire\PaginationComponent;
use App\Models\Category;

class AdminCategoryComponent extends PaginationComponent
{
    public function deleteCategory($category_id)
    {
        Category::destroy($category_id); //intended not showing 404 if the user manuplated the id

        session()->flash('success', 'Category deleted successfully');
    }
    public function render()
    {
        return view('livewire.admin.category.admin-category-component', ['categories' => Category::paginate(5)])->layout('layouts.base');
    }
}
