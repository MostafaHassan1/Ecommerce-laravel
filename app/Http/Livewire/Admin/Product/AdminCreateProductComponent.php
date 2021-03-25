<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Throwable;

class AdminCreateProductComponent extends Component
{
    use WithFileUploads;

    public $product, $image;
    // TODO adding file uploading
    // TODO adding saving product logic
    // TODO adding validation rules
    protected $rules = [
        'product.name' => 'required|min:3|max:255|string',
        'product.slug' => 'required',
        'product.short_description' => 'required|min:3|max:255|string',
        'product.description' => 'required|min:3|string',
        'product.regular_price' => 'required|numeric|min:1',
        'product.sale_price' => 'required|numeric|lte:product.regular_price',
        'product.SKU' => 'required|min:3|max:255|string',
        'product.stock_status' => 'required|in:instock,outofstock',
        'product.featured' => 'required|boolean',
        'product.quantity' => 'required|numeric|min:1',
        'product.category_id' => 'bail|required|integer|exists:categories,id',
    ];
    public function mount()
    {
        $this->product = new Product();
        $this->product->stock_status = 'instock';
        $this->product->featured = 0;
    }
    public function generateSlug()
    {
        try {
            $this->validateOnly('product.name');
            $this->product->slug = Str::slug($this->product->name);
        } catch (Throwable $e) { //if validation fails, reset the slug, add the validation errors to the errors bag
            $this->product->slug = '';
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
        $this->product->save();

        session()->flash('success', 'Product has been created successfully');
    }

    public function render()
    {
        return view('livewire.admin.product.admin-create-product-component', ['categories' => Category::all()])
            ->layout('layouts.base');
    }
}
