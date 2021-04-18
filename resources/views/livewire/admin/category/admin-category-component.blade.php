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
                        <div class="col-md-6">All Categories</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.categories.create')}}" class="btn btn-success pull-right">New
                                Category</a>
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td><a href="{{route('admin.categories.edit',$category->slug)}}">
                                        <i class="fa fa-edit fa-2x "></i></a>
                                    <a href="#" onclick="confirm('Are you sure you want to delete this category?')" wire:click.prevent="deleteCategory({{$category->id}})">
                                        <i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="wrap-pagination-info">
                        {{$categories->links('custom-views.custom-pagination')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>