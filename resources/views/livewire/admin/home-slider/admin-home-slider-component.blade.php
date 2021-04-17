<div class="container" style="padding: 30px 0">
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">All sliders</div>
                        <div class="col-md-6">
                            <a href="{{route('admin.home-sliders.create')}}" class="btn btn-success pull-right">
                                New Home Slider</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td><img src="{{asset('storage/'.$slider->image)}}" alt="{{$slider->name}}" width="60">
                                </td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->subtitle}}</td>
                                <td>{{$slider->price}}</td>
                                <td>{{$slider->status ? "Active" : "Inactive"}}</td>
                                <td>{{$slider->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.home-sliders.edit',$slider->id)}}">
                                        <i class="fa fa-edit fa-2x "></i></a>
                                    <a href="#" wire:click.prevent="deleteHomeSlider({{$slider->id}})">
                                        <i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="wrap-pagination-info">
                        {{$sliders->links('custom-views.custom-pagination')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>