<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Add New Home Slider</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.home-sliders')}}" class="btn btn-success pull-right">All
                                Home Sliders</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="createHomeSlider"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="title">Home Slider Title</label>
                            <div class="col-md-4">
                                <input type="text" name="title" id="title" class="form-control input-md"
                                    placeholder="Home Slider Title" wire:model.debounce.500ms="homeSlider.title">
                                @error('homeSlider.title')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="subtitle">Home Slider Subtitle</label>
                            <div class="col-md-4">
                                <input type="text" name="subtitle" id="subtitle" class="form-control input-md"
                                    placeholder="Home Slider Subtitle" wire:model.debounce.500ms="homeSlider.subtitle">
                                @error('homeSlider.subtitle')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="link">Home Slider Link</label>
                            <div class="col-md-4">
                                <input type="text" name="link" id="link" class="form-control input-md"
                                    placeholder="Home Slider Link" wire:model.debounce.500ms="homeSlider.link">
                                @error('homeSlider.link')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="price">Price</label>
                            <div class="col-md-4">
                                <input type="number" name="price" id="price" class="form-control input-md"
                                    placeholder="Home Slider Price" wire:model="homeSlider.price">
                                @error('homeSlider.price')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="status">status</label>
                            <div class="col-md-4">
                                <select name="status" id="status" class="form-control" wire:model="homeSlider.status">
                                    <option selected value="0">Not Active</option>
                                    <option value="1">Active</option>
                                </select>
                                @error('homeSlider.status')
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