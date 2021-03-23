<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminCreateCategoryComponent extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'bail|required|min:3|string|unique:categories'
    ];
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function createCategory()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        session()->flash('success', 'Category created successfuly');
    }

    public function render()
    {
        return view('livewire.admin.category.admin-create-category-component')->layout('layouts.base');
    }
}
