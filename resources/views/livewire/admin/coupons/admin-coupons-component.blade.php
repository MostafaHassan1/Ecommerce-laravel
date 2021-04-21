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
                        <div class="col-md-6">All Coupons</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.coupons.create')}}" class="btn btn-success pull-right">New
                                Coupon</a>
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
                            <th>Code</th>
                            <th>Value</th>
                            <th>Type</th>
                            <th>Cart Value</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->id}}</td>
                                <td>{{$coupon->code}}</td>
                                <td>{{$coupon->value}}</td>
                                <td>{{$coupon->type}}</td>
                                <td>{{$coupon->cart_value}}</td>
                                <td><a href="{{route('admin.coupons.edit',$coupon->id)}}">
                                        <i class="fa fa-edit fa-2x "></i></a>
                                    <a href="#" onclick="confirm('Are you sure you want to delete this coupon?')"
                                        wire:click.prevent="deleteCoupon({{$coupon->id}})">
                                        <i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="wrap-pagination-info">
                        {{$coupons->links('custom-views.custom-pagination')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>