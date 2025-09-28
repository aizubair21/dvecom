<?php

namespace App\Livewire\System\Category;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class Create extends Component
{
    use \App\hangleImageUpload, WithFileUploads;

    public $name;
    public $thumbnail;

    protected $rules = [
        'name' => 'required|string|max:255',
        'thumbnail' => 'nullable|image|max:1024', // max 1MB
    ];

    public function createCategory()
    {
        $this->validate();

        $imagePath = $this->handleImageUpload($this->thumbnail, $this->name, 'categories', '');

        \App\Models\Category::create([
            'name' => Str::title($this->name),
            'slug' => Str::slug($this->name),
            'thumbnail' => $imagePath,
        ]);

        // session()->flash('message', 'Category created successfully.');
        $this->dispatch('category-created');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.system.category.create');
    }
}
