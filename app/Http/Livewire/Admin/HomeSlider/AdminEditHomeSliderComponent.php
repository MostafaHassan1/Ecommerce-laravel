<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $homeSlider, $image;
    public function mount(HomeSlider $homeSlider)
    {
        $this->homeSlider = $homeSlider;
    }
    protected $rules = [
        'homeSlider.title' => 'required|min:3|max:255|string',
        'homeSlider.subtitle' => 'required|min:3|max:255|string',
        'homeSlider.price' => 'required|numeric|min:1',
        'homeSlider.status' => 'required|boolean',
        'homeSlider.link' => 'required|url',
    ];
    /**
     * When an image is upladed this function is fired
     * it validates the image and set the temprorary image path to the homeslider
     * and other direct way results in an error 
     */
    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:1024', //1MB
        ]);
    }

    public function updateHomeSlider()
    {
        $this->validate();
        if ($this->image)
            $this->homeSlider->image = $this->image;
        $this->homeSlider->save();

        session()->flash('success', 'Home Slider has been Edited successfully');
    }
    public function render()
    {
        return view('livewire.admin.home-slider.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
