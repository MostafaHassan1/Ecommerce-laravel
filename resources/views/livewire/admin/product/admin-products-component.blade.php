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
                        <div class="col-md-6">All Products</div>
                        <div class="col-md-6">
                            <a href="{{route('admin.products.create')}}" class="btn btn-success pull-right">
                                New Product</a>
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
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Sale</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}"
                                        width="60"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->stock_status}}</td>
                                <td>{{$product->regular_price}}</td>
                                <td>{{$product->sale_price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.products.edit',$product->slug)}}">
                                        <i class="fa fa-edit fa-2x "></i></a>
                                    <a href="#" onclick="confirm('Are you sure you want to delete this product?')" wire:click.prevent="deleteProduct({{$product->id}})">
                                        <i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="wrap-pagination-info">
                        {{$products->links('custom-views.custom-pagination')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>