<?php

namespace App\Livewire\System\Category;

use App\hangleImageUpload;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class Index extends Component
{
    use hangleImageUpload, WithFileUploads;

    public $categories, $editableCategory, $name, $thumbnail, $newImage;

    public function mount()
    {
        $this->categories = Category::all();
    }

    #[On('category-created')]
    public function notifyAsCreated()
    {
        $this->categories = Category::all();
        $this->dispatch('close-modal', 'category-create-modal');
        $this->dispatch('close-modal', 'category-edit-modal');
        $this->dispatch('success', 'Category Updated !');
    }

    public function editCategory($id)
    {
        $this->editableCategory = Category::find($id);
        $this->name = $this->editableCategory['name'];;
        $this->thumbnail = $this->editableCategory['thumbnail'];;
        // dd($this->editableCategory);
        $this->dispatch('open-modal', 'category-edit-modal');
    }


    public function updateCategory()
    {
        // dd($this->handleImageUpload($this->newImage, $this->name, 'category', $this->thumbnail));
        $this->validate(
            [
                'name' => ['required', 'string', 'max:50', Rule::unique(Category::class)->ignore($this->editableCategory['id'])]
            ]
        );
        $cat = Category::find($this->editableCategory['id']);
        $cat->name = $this->name;
        $cat->slug = Str::slug($this->name);
        $cat->thumbnail = $this->handleImageUpload($this->newImage, $this->name, 'category', $this->thumbnail);
        $cat->save();

        $this->reset('newImage', 'editableCategory');
        $this->dispatch('category-created');
    }


    public function deleteCategory($id)
    {
        $cat = Category::find($id);
        if ($cat->products()->count() > 0) {
            // cannot delete category with products
            $this->dispatch('error', 'Cannot delete category with products !');
            return;
        }
        // delete category
        $cat->delete();
        $this->categories = Category::all();
        $this->dispatch('success', 'Category Deleted !');
    }

    public function render()
    {
        return view('livewire.system.category.index');
    }
}
