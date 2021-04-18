<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleManagementComponent extends Component
{
    public $sale;
    protected $rules = [
        'sale.status' => 'required|boolean',
        'sale.sale_date' => 'required|date_format:Y-m-d H:i:s'
    ];
    public function mount()
    {
        $this->sale = Sale::first();
        // dd($this->sale);
    }
    public function manageSale()
    {
        $this->validate();
        Sale::updateOrInsert(['id' => 1], ['status' => $this->sale['status'], 'sale_date' => $this->sale['sale_date']]);

        session()->flash('success', 'Sale has been done successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-sale-management-component')->layout('layouts.base');
    }
}
