<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Throwable;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $product, $image, $slug;
    public function mount(Product $product)
    {
        $this->product = $product;
        $this->slug = $product->slug; //this sepration because product->slug is messing with the url by route model binding 
    }
    protected function rules()
    {
        return
            [
                'product.name' => ['required', 'min:3', 'max:255', 'string', Rule::unique('products', 'name')->ignore($this->product->id)],
                'slug' => 'required',
                'product.short_description' => 'min:3|max:255|string',
                'product.description' => 'required|min:3|string',
                'product.regular_price' => 'required|numeric|min:1',
                'product.sale_price' => 'numeric|lte:product.regular_price',
                'product.SKU' => 'required|min:3|max:255|string',
                'product.stock_status' => 'required|in:instock,outofstock',
                'product.featured' => 'required|boolean',
                'product.quantity' => 'required|numeric|min:1',
                'product.category_id' => 'bail|required|integer|exists:categories,id',
            ];
    }
    public function generateSlug()
    {
        try {
            $this->validateOnly('product.name');
            $this->slug = Str::slug($this->product->name);
        } catch (Throwable $e) { //if validation fails, reset the slug, add the validation errors to the errors bag
            $this->slug = $this->product->slug;
            foreach ($e->validator->getMessageBag()->get('product.name') as $error) {
                $this->addError('product.name', $error);
            }
        }
    }
    /**
     * When an image is upladed this function is fired
     * it validates the image and set the temprorary image path to the product
     * and other direct way results in an error 
     */
    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:1024', //1MB
        ]);
    }

    public function createProduct()
    {
        $this->validate();

        $this->product->image = $this->image;
        $this->product->slug = $this->slug;
        $this->product->save();

        session()->flash('success', 'Product has been Edited successfully');
    }
    public function render()
    {
        return view('livewire.admin.product.admin-edit-product-component', ['categories' => Category::all()])->layout('layouts.base');
    }
}
