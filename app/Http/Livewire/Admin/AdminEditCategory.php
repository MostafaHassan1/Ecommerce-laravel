<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategory extends Component
{
    public $name, $slug, $category;

    protected $rules = [
        'name' => 'bail|required|min:3|string|unique:categories'
    ];

    public function mount(Category $category)
    {
        //separating the name and slug form the category object because the binding is causing problems in the url
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->category = $category; //we need the category object so we can access the DB from it's id //another apporach would be saving the id or the old slug
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        session()->flash('success', 'Category Updated successfuly');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category')->layout('layouts.base');
    }
}
