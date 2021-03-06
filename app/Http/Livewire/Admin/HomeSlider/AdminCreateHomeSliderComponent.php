<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCreateHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $homeSlider, $image;
    protected $rules = [
        'homeSlider.title' => 'required|min:3|max:255|string',
        'homeSlider.subtitle' => 'required|min:3|max:255|string',
        'homeSlider.price' => 'required|numeric|min:1',
        'homeSlider.status' => 'required|boolean',
        'homeSlider.link' => 'required|url',
        'image' => 'required|image|max:1024', //1MB
    ];
    public function mount()
    {
        $this->homeSlider = new HomeSlider();
        $this->homeSlider->status = 0;
    }

    public function createHomeSlider()
    {
        $this->validate();

        $this->homeSlider->image = $this->image;
        $this->homeSlider->save();

        session()->flash('success', 'Home Slider has been created successfully');
    }


    public function render()
    {
        return view('livewire.admin.home-slider.admin-create-home-slider-component')->layout('layouts.base');
    }
}
