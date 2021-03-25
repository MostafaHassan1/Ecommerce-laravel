<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Add New Product</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All
                                Products</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="createProduct"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="name">Product Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" id="name" class="form-control input-md"
                                    placeholder="Product Name" wire:model.debounce.500ms="product.name"
                                    wire:keydown.debounce.500ms="generateSlug">
                                @error('product.name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="slug">Product Slug</label>
                            <div class="col-md-4">
                                <input type="text" disabled name="slug" id="slug" class="form-control input-md"
                                    placeholder="Product Slug" wire:model="product.slug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="short_description">Short Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Product short description"
                                    wire:model="product.short_description"></textarea>
                                @error('product.short_description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="description">Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Product description"
                                    wire:model="product.description"> </textarea>
                                @error('product.short_description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="regular_price">Regular Price</label>
                            <div class="col-md-4">
                                <input type="number" name="regular_price" id="regular_price"
                                    class="form-control input-md" placeholder="Product Regular Price"
                                    wire:model="product.regular_price">
                                @error('product.regular_price')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="sale_price">Sale Price</label>
                            <div class="col-md-4">
                                <input type="number" name="sale_price" id="sale_price" class="form-control input-md"
                                    placeholder="Product sale Price" wire:model="product.sale_price">
                                @error('product.sale_price')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="SKU">SKU</label>
                            <div class="col-md-4">
                                <input type="text" name="SKU" id="SKU" class="form-control input-md"
                                    placeholder="Product SKU" wire:model="product.SKU">
                                @error('product.SKU')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="stock_status">Stock Status</label>
                            <div class="col-md-4">
                                <select name="stock_status" id="stock_status" class="form-control"
                                    wire:model="product.stock_status">
                                    <option selected value="instock">Instock</option>
                                    <option value="outofstock">Out Of Stock</option>
                                </select>
                                @error('product.stock_status')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="featured">Featured</label>
                            <div class="col-md-4">
                                <select name="featured" id="featured" class="form-control"
                                    wire:model="product.featured">
                                    <option selected value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                @error('product.featured')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="quantity">Quantity</label>
                            <div class="col-md-4">
                                <input type="number" name="quantity" id="quantity" class="form-control input-md"
                                    placeholder="Product quantity" wire:model="product.quantity">
                                @error('product.quantity')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="image">Image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="image" class="input-file" wire:model="image">
                                @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                @if ($image != '')
                                <img src="{{$image->temporaryUrl()}}" width="80" height="80">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="category">Category</label>
                            <div class="col-md-4">
                                <select name="category_id" id="category" wire:model="product.category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('product.category')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>