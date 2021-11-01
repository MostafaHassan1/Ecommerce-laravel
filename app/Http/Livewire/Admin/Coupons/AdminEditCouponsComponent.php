<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AdminEditCouponsComponent extends Component
{
    public $coupon;
    public function mount(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }
    protected function rules()
    {
        return
            [
                'coupon.code' => ['required', 'min:3', 'max:255', 'string', Rule::unique('coupons', 'code')->ignore($this->coupon->id)],
                'coupon.value' => 'required|numeric|min:1',
                'coupon.cart_value' => 'required|numeric',
                'coupon.type' => 'required|in:fixed,percent',
            ];
    }

    public function createCoupon()
    {
        $this->validate();
        $this->coupon->save();

        session()->flash('success', 'Coupon has been Edited successfully');
    }

    public function render()
    {
        return view('livewire.admin.coupons.admin-edit-coupons-component')->layout('layouts.base');
    }
}
