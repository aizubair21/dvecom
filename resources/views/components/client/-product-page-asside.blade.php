<div>
    <!-- Well begun is half done. - Aristotle -->
    {{-- <x-nav-link type="btn-primary">
        All Product
    </x-nav-link>

    <hr class="my-2" /> --}}

    <div>
        <p class="text-xs mb-1">Sort</p>
        <div class="flex items-center justify-between mb-1 px-2 py-1 w-full hover:bg-gray-100 border rounded">
            <div class="flex items-center">
                <input value="asec" type="radio" id="category_assending" class="w-5 h-5 rounded mr-2" />
                <x-input-label class="text-sm" for="category_assending" value="Newer (A-Z)" />
            </div>
        </div>
        <div class="flex items-center justify-between mb-1 px-2 py-1 w-full hover:bg-gray-100 border rounded">
            <div class="flex items-center">
                <input value="Assending (A-Z)" type="radio" id="desc" class="w-5 h-5 rounded mr-2" />
                <x-input-label class="text-sm" for="desc" value="Older (Z-A)" />
            </div>
        </div>

        <p class="text-xs mb-1 mt-3">Category</p>

        @foreach ($categories as $cat)
        <div class="flex items-center justify-between mb-1 px-2 py-1 w-full hover:bg-gray-100 border rounded">
            <div class="flex items-center">
                <input wire:model.live='categoriesIdList' value="{{$cat->id}}" type="checkbox"
                    id="category_{{$cat->id}}" class="w-5 h-5 rounded mr-2" />
                <x-input-label class="text-sm" for="category_{{$cat->id}}" :value="$cat->name" />
            </div>
            <div>
                {{$cat->products?->count()}}
            </div>
        </div>
        @endforeach
    </div>
</div>