<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Edit Coupon</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">All
                                Coupons</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="createCoupon"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="code">Coupon Code</label>
                            <div class="col-md-4">
                                <input type="text" name="code" id="code" class="form-control input-md"
                                    placeholder="Coupon Code" wire:model.debounce.500ms="coupon.code">
                                @error('coupon.code')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="value">Value</label>
                            <div class="col-md-4">
                                <input type="number" name="value" id="value" class="form-control input-md"
                                    placeholder="Coupon Value" wire:model="coupon.value">
                                @error('coupon.value')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="cart_value">Cart Value</label>
                            <div class="col-md-4">
                                <input type="number" name="cart_value" id="cart_value" class="form-control input-md"
                                    placeholder="Coupon Cart Value" wire:model="coupon.cart_value">
                                @error('coupon.cart_value')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="type">type</label>
                            <div class="col-md-4">
                                <select name="type" id="type" class="form-control" wire:model="coupon.type">
                                    <option selected value="fixed">Fixed</option>
                                    <option value="percent">Percent</option>
                                </select>
                                @error('coupon.type')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
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