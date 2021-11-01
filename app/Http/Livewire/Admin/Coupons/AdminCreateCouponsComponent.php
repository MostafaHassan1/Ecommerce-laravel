<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class AdminCreateCouponsComponent extends Component
{
    public $coupon;
    protected $rules = [
        'coupon.code' => 'required|min:3|max:255|string|unique:coupons,code',
        'coupon.value' => 'required|numeric|min:1',
        'coupon.cart_value' => 'required|numeric',
        'coupon.type' => 'required|in:fixed,percent',
    ];
    public function mount()
    {
        $this->coupon = new Coupon();
        $this->coupon->type = 'fixed';
    }

    public function createCoupon()
    {
        $this->validate();

        $this->coupon->save();

        session()->flash('success', 'Coupon has been created successfully');
    }

    public function render()
    {
        return view('livewire.admin.coupons.admin-create-coupons-component')->layout('layouts.base');
    }
}
