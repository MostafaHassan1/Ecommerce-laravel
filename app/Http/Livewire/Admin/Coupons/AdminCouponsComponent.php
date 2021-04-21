<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Http\Livewire\PaginationComponent;
use App\Models\Coupon;

class AdminCouponsComponent extends PaginationComponent
{
    public function deleteCoupon($coupon_id)
    {
        Coupon::destroy($coupon_id); //intended not showing 404 if the user manuplated the id

        session()->flash('success', 'Coupon deleted successfully');
    }
    public function render()
    {
        $coupons = Coupon::paginate(10);
        return view('livewire.admin.coupons.admin-coupons-component', compact('coupons'))->layout('layouts.base');
    }
}
