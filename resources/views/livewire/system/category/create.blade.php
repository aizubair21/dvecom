<div>
    {{-- The Master doesn't talk, he acts. --}}


    <x-layouts.container>

        <flux:input wire:model="name" :label="__('Category Name')" type="text" required autofocus autocomplete="name"
            :placeholder="__('Category Name')" />

        <hr class="my-2" />
        <x-input-file label="Category Image" error="thumbnail">
            @if ($thumbnail)
            <img src="{{ $thumbnail->temporaryUrl() }}" alt="Image Preview" class="mt-2 h-12 w-12 object-cover" />
            @endif
            <div class="text-sm text-gray-500">PNG, JPG up to 1MB</div>
            <input type="file" wire:model="thumbnail" accept="image/*" max="1024" class="mt-1 block w-full" />
            @error('thumbnail')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </x-input-file>
        <hr class="my-2" />
        <div class="flex justify-end mt-4">
            <x-secondary-button class="mr-2" @click="$dispatch('close-modal', 'category-create-modal')">Cancel
            </x-secondary-button>
            <x-primary-button wire:click="createCategory" :disabled="$errors->any()">Create</x-primary-button>
        </div>
    </x-layouts.container>
</div>