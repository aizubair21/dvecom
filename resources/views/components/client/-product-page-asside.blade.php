<div>
    <!-- Well begun is half done. - Aristotle -->
    {{-- <x-nav-link type="btn-primary">
        All Product
    </x-nav-link>

    <hr class="my-2" /> --}}

    <div>
        <p class="text-xs mb-1">Category</p>

        @foreach ($categories as $cat)
        <div class="flex items-center justify-start mb-1 px-2 py-1 w-full hover:bg-gray-100 border rounded">
            <input wire:model.live='categoriesIdList' value="{{$cat->id}}" type="checkbox" id="category_{{$cat->id}}"
                class="w-5 h-5 rounded mr-2" />
            <x-input-label class="text-sm" for="category_{{$cat->id}}" :value="$cat->name" />
        </div>
        @endforeach
    </div>
</div>