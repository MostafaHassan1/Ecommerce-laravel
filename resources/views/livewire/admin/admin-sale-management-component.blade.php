<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Manage Sale</div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="manageSale">
                        <div class="form-group">
                            <label class="control-label col-md-4" for="status">Sale Status</label>
                            <div class="col-md-4">
                                <select name="status" id="status" class="form-control" wire:model="sale.status">
                                    <option selected value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                @error('sale.status')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="date">Sale Date</label>
                            <div class="col-md-4">
                                <input type="text" name="date" id="date" class="form-control input-md"
                                    placeholder="YYYY-MM-DD H:M:S" wire:model="sale.sale_date">
                                    @error('sale.date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit"
                                    class="btn btn-primary">{{isset($sale->id)? 'Update' : 'Create'}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>