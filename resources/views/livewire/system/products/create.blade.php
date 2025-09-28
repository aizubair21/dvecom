<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    {{-- <x-slot name="header">
    </x-slot> --}}

    <x-layouts.container>
        <x-layouts.section>
            <x-slot name="header">
                <div>
                    <i class="fas fa-plus pr-2"></i> Add Products
                </div>

                <x-nav-link href="{{ route('system.products.index') }}" type="btn-primary">
                    <i class="fa-solid fa-angle-left pr-2"></i> Products
                </x-nav-link>
            </x-slot>

            <div class="">

                <form action="" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Product Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="sku" :value="__('SKU')" />
                        <x-text-input id="sku" class="block mt-1 w-full" type="text" name="sku" :value="old('sku')"
                            required autofocus autocomplete="sku" />
                        <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                            :value="old('price')" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="stock" :value="__('Stock')" />
                        <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock"
                            :value="old('stock')" required autofocus autocomplete="stock" />
                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="description" rows="4" required>{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                </form>
            </div>
        </x-layouts.section>
    </x-layouts.container>
</div>