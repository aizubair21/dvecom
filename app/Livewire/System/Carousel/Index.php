<?php

namespace App\Livewire\System\Carousel;

use App\hangleImageUpload;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Carousel as sliderModel;
use App\Models\Carousel_has_slides as slider_has_slides;

use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

#[layout('layouts.app')]
class Index extends Component
{

    use WithFileUploads, hangleImageUpload;
    #[URL]
    public $nav = 'Home';
    public $slider = [];

    #[validate('required')]
    public $sliderName;
    public $sliderImage, $sliderPlacement = 'Home', $status = true, $sler = '', $slides = [], $ss, $updateable = [], $background_color;


    public function mount()
    {
        $this->getData();
    }

    #[On('refresh')]
    public function getData()
    {
        $this->slider = sliderModel::all();
        // dd($this->slider);
    }

    public function createNewSlider()
    {
        $this->validate();
        try {
            DB::transaction(function () {

                sliderModel::create([
                    'name' => $this->sliderName,
                    'placement' => $this->sliderPlacement,
                    'image' => $this->handleImageUpload($this->sliderImage, 'slider', null),
                    'backgrond_color' => $this->background_color,
                    'status' => $this->status,
                ]);
            });
            $this->getData();
            $this->dispatch('close-modal', 'open-slider-modal');
        } catch (\Throwable $th) {
            dd($th);
            $this->sler = 'Error !';
        }
    }

    public function updateStatusTrue(sliderModel $slider)
    {
        try {
            // sliderModel::query()->where(['placement' => $slider->placement])->update(['status' => false]);
            $slider->status = true;
            $slider->save();
        } catch (\Throwable $th) {
            // throw $th;
        }

        $this->dispatch('refresh');
    }
    public function updateStatusFalse(sliderModel $slider)
    {
        try {
            // sliderModel::query()->where(['placement' => $slider->placement])->update(['status' => false]);
            $slider->status = false;
            $slider->save();
        } catch (\Throwable $th) {
            throw $th;
        }
        $this->dispatch('refresh');
    }


    public function deleteSide($id)
    {
        try {
            sliderModel::destroy($id);
        } catch (\Throwable $th) {
            //throw $th;
        }

        $this->getData();
    }


    public function openUpdateModal($id)
    {
        $this->updateable = sliderModel::find($id)->toArray();
        // dd($this->updateable);
        $this->dispatch('open-modal', 'open-slides-modal');
    }


    public function updateSlider()
    {
        $sl = sliderModel::find($this->updateable['id']);

        $sl->update([
            'name' => $this->updateable['name'],
            'placement' => $this->updateable['placement'],
            'status' => true,
        ]);

        $this->getData();
    }

    public function render()
    {
        return view('livewire.system.carousel.index');
    }
}
