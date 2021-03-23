<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Update Category</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">All
                                Categories</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="updateCategory">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="name">Category Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" id="name" class="form-control input-md"
                                    placeholder="Category Name" wire:model="name" wire:keyup="generateSlug">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="slug">Category Slug</label>
                            <div class="col-md-4">
                                <input type="text" disabled name="slug" id="slug" class="form-control input-md"
                                    placeholder="Category Slug" wire:model="slug">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>