<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-slot name="header">
        Manage Categories
    </x-slot>

    <x-layouts.container>
        <x-layouts.section>

            <x-slot name="header">
                Categories

                <x-primary-button @click="$dispatch('open-modal', 'category-create-modal')">
                    <i class="fas fa-plus pr-2"></i> Add
                </x-primary-button>
            </x-slot>


            <div class="overflow-x-scroll">
                <table class="w-full">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Earning</th>
                        <th>Create</th>
                        <th>A/C</th>
                    </thead>

                    <tbody>
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->product }}</td>
                            <td>{{ $item->earning }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="flex items-center space-x-1">
                                    <x-primary-button wire:click='editCategory({{$item->id}})'>
                                        <i class="fas fa-edit "></i>
                                    </x-primary-button>
                                    <x-danger-button wire:confirm='Are You sure want to delete {{$item->name}} ?'
                                        wire:click='deleteCategory({{$item->id}})'>
                                        <i class="fas fa-trash "></i>
                                    </x-danger-button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-layouts.section>
    </x-layouts.container>



    <x-modal name="category-create-modal" maxWidth="2xl">
        <x-slot name="header">
            Create A Category
        </x-slot>

        <div class="px-3 md:px-auto">
            <livewire:system.category.create />
        </div>
    </x-modal>

    <x-modal name="category-edit-modal" maxWidth="2xl">
        <x-slot name="header">
            Update Category
        </x-slot>

        <div class="p-3 md:px-auto">
            <flux:input wire:model.live="name" :label="__('Category Name')" type="text" required autofocus="true"
                autocomplete="name" :placeholder="__('Category Name')" />

            <hr class="my-2" />
            <x-input-file label="Category Image" error="thumbnail">
                @if ($newImage)
                <img src="{{ $newImage->temporaryUrl() }}" alt="Image Preview" class="mt-2 h-12 w-12 object-cover" />
                @else
                <img src="{{ asset('storage/' . $thumbnail) }}" alt="Image Preview"
                    class="mt-2 h-12 w-12 object-cover" />
                @endif
                <div class="text-sm text-gray-500">PNG, JPG up to 1MB</div>
                <input type="file" wire:model.live="newImage" accept="image/*" max="1024" class="mt-1 block w-full" />
                @error('newImage')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </x-input-file>
            <hr class="my-2" />
            <div class="flex justify-end mt-4">
                <x-secondary-button class="mr-2" @click="$dispatch('close-modal', 'category-create-modal')">Cancel
                </x-secondary-button>
                <x-primary-button wire:click="updateCategory" :disabled="$errors->any()">
                    Update</x-primary-button>
            </div>
        </div>
    </x-modal>

</div>