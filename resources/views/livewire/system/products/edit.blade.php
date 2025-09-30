<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <x-slot name="header">
        Edit Product | {{$products['name'] ?? "N\A"}} [{{$id}}]
    </x-slot>

    <x-layouts.container>
        <div class="flex justify-between items-start">
            {{-- left side product created form --}}
            <div>
                <x-layouts.section>
                    @if ($products['status'] == 'Active')
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-check-circle pr-2"></i> Product
                        </div>
                        <div>
                            In Live
                        </div>
                    </x-slot>
                    <x-danger-button type="button" wire:click="updateStatus('Draft')">
                        <i class="fas fa-trash pr-2"></i> Move to Draft
                    </x-danger-button>
                    @endif
                    @if ($products['status'] == 'Draft')
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-check-circle pr-2"></i> Product
                        </div>
                        <div>
                            Drafted
                        </div>
                    </x-slot>
                    <x-primary-button type="button" wire:click="updateStatus('Active')">
                        <i class="fas fa-check-circle pr-2"></i> Live Now
                    </x-primary-button>
                    @endif
                </x-layouts.section>
                <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-plus pr-2"></i> Edit Products
                        </div>

                        <div class="flex space-x-2">
                            <x-nav-link href="{{ route('system.products.index') }}" type="btn-secondary">
                                <i class="fa-solid fa-angle-left pr-2"></i> Products
                            </x-nav-link>
                            <x-nav-link href="{{ route('system.products.create') }}" title="Add New Product"
                                type="btn-primary">
                                <i class="fa-solid fa-plus"></i>
                            </x-nav-link>
                        </div>
                    </x-slot>


                    <div>
                        <x-input-label for="name" :value="__('Product Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model.lazy="products.name"
                            :value="old('products.name')" required autocomplete="name"
                            placeholder="Product Name Goes Here" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="py-2">
                        <textarea wire:model.lazy="short_description" id="short_des" cols="10"
                            class="w-full border rounded-md p-2" placeholder="Product Short Description"></textarea>
                    </div>

                    <x-input-file class="justify-between" label="Category" name="category" error="category_id">
                        <div class="flex space-x-2 items-center">
                            <select wire:model.lazy="products.category_id" id="category_id"
                                class="px-2 py-1 border rounded-md w-full">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <x-secondary-button type="button" @click="$dispatch('open-modal', 'add-category-modal')">
                                <i class="fas fa-plus"></i>
                            </x-secondary-button>
                        </div>
                    </x-input-file>

                </x-layouts.section>

                <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-dollar-sign pr-2"></i> Price & Stock
                        </div>
                    </x-slot>
                    <div class="flex flex-wrap items-start gap-3">

                        <div>
                            <flux:input label="Neet Price" type="number" wire:model.lazy='products.neet_price' />
                        </div>
                        <div>
                            {{--
                            <x-input-label for="price" :value="__('Seling Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number"
                                wire:model.lazy="products.price" :value="old('price')" min="0" step="1"
                                placeholder="00.00" required autocomplete="price" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" /> --}}
                            <flux:input label="Price" type="number" wire:model.lazy='products.price' />

                        </div>
                        <div>
                            {{--
                            <x-input-label for="stock" :value="__('Stock')" />
                            <x-text-input id="stock" class="block mt-1" type="number" wire:model.lazy="products.stock"
                                :value="old('stock')" min="0" step="1" placeholder="100" required
                                autocomplete="stock" />
                            <x-input-error :messages="$errors->get('stock')" class="mt-2" /> --}}
                            <flux:input label="Stock" type="number" wire:model.lazy='products.stock' />
                        </div>

                    </div>
                    <div class="p-3 mt-2 border rounded-md shadow-sm">
                        <div class="flex justify-between items-center pb-2">
                            {{-- in stock --}}
                            <x-input-label for="in_stock" class="ml-2" :value="__('Discount')" />
                            @php

                            @endphp
                            <select class="py-1 px-2 border rounded-md" id="discount" wire:model.lazy='offer_type'>
                                {{-- fixed amount or percentage --}}
                                <option value="0">No Discount</option>
                                <option value="amount">Custom</option>
                                <option value="5">5% Off</option>
                                <option value="10">10% Off</option>
                                <option value="15">15% Off</option>
                                <option value="20">20% Off</option>
                                <option value="25">25% Off</option>
                                <option value="30">30% Off</option>
                                <option value="35">35% Off</option>
                                <option value="40">40% Off</option>
                                <option value="45">45% Off</option>
                                <option value="50">50% Off</option>
                                <option value="55">55% Off</option>
                                <option value="60">60% Off</option>
                                <option value="65">65% Off</option>
                                <option value="70">70% Off</option>

                            </select>
                        </div>
                        <div class="flex space-x-2">
                            <div>
                                <x-text-input id="discount_save" class="w-48 block mt-1 w-full" type="number"
                                    wire:model.lazy="products.discount_save" :value="old('discount_save')" min="0"
                                    step="1" placeholder="100" autocomplete="discount_save" />
                                <x-input-error :messages="$errors->get('discount_save')" class="mt-2" />
                            </div>

                            <x-text-input id="discount" class="w-48 block mt-1 w-full border-0 ring-0" type="number"
                                wire:model.lazy="products.discount" disabled :value="old('products.discount')" min="0"
                                step="1" placeholder="100" autocomplete="discount" />
                        </div>
                        <div class="mt-1 rounded-md p-3 flex justify-between items-center bg-lime-900 text-white">
                            <div>
                                Profit
                                @if ($products['discount_save'] && $products['discount'])
                                <span class="ps-2 text-xs bg-lime-300 text-white rounded-xl px-2">Discount</span>
                                @endif
                            </div>
                            <div>
                                @if ($products['discount_save'] && $products['discount'])
                                {{$products['discount'] - $products['neet_price']}}
                                <span class="text-xs px-1 bg-gray-200 text-black rounded-xl"> {{
                                    $products['price'] - $products['neet_price'] }} </span>
                                @else
                                {{ $products['price'] - $products['neet_price'] }}
                                @endif
                            </div>
                        </div>
                    </div>


                    {{-- settings --}}
                    <div class="py-3">
                        <div class="flex justify-between items-center p-3 border-b">
                            {{-- in stock --}}
                            <div class="ml-2">
                                <x-input-label for="in_stock" class="" :value="__('In Stock')" />
                                <p class="text-xs text-gray-500">If unchecked, this product will be marked as
                                    out of
                                    stock.</p>
                            </div>
                            <input id="in_stock" type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                wire:model.live="in_stock" checked>
                        </div>
                        <div class="flex justify-between items-center p-3 border-b">
                            {{-- in stock --}}
                            <div class="ml-2">
                                <x-input-label for="display_at_home" class="" :value="__('Display at Home')" />
                                <p class="text-xs text-gray-500">If checked, this product will be displayed on
                                    the
                                    homepage.</p>
                            </div>
                            <input id="display_at_home" wire:model.lazy='products.display_at_home' type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="display_at_home" checked>
                        </div>
                        <div class="flex justify-between items-center p-3 border-b">
                            {{-- is recommended --}}
                            <div class="ml-2">
                                <x-input-label for="recommended" :value="__('Is Recommended ?')" />
                                <p class="text-xs text-gray-500">If checked, this product will be featured in
                                    the
                                    recommended products section.</p>
                            </div>
                            <input id="recommended" type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                wire:model.lazy="products.recommended" checked>
                        </div>
                        <div class="flex justify-between items-center p-3 border-b">
                            {{-- cod --}}
                            <div class="ml-2">
                                <x-input-label for="cod" :value="__('COD Available ?')" />
                                <div class="text-xs text-gray-500">If checked, this product will be available
                                    for Cash
                                    on Delivery (COD) option.</div>
                            </div>
                            <input id="cod" type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                wire:model.lazy="products.cod" checked>
                        </div>
                        <div class="flex justify-between items-center p-3 border-b">
                            {{-- courier --}}
                            <div class="ml-2">
                                <x-input-label for="courier" :value="__('Courier Delivery ?')" />
                                <div class="text-xs text-gray-500">If checked, this product will be available
                                    for
                                    Courier
                                    Delivery option.</div>
                            </div>
                            <input id="courier" type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                wire:model.lazy="products.courier" checked>
                        </div>
                        <div class="flex justify-between items-center p-3 border-b">
                            {{-- hand --}}
                            <div class="ml-2">
                                <x-input-label for="hand" :value="__('Hand Cash ?')" />
                                <div class="text-xs text-gray-500">If checked, this product will be available
                                    for Hand
                                    Cash
                                    option.</div>
                            </div>
                            <input id="hand" type="checkbox"
                                class="h-5 w-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                wire:model.lazy="products.hand" checked>
                        </div>
                        <div class="py-2 bg-gray-100">
                            <div class="flex justify-between items-center p-3 border-b">
                                {{-- hand --}}
                                <div class="ml-2">
                                    <x-input-label for="cupon" :value="__('Accept Cupon ?')" />
                                    <p class="text-xs text-gray-500">
                                        If checked, this product will be available for accept any cupon code.
                                    </p>
                                </div>
                                <input id="cupon" type="checkbox"
                                    class="h-5 w-5 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    wire:model.lazy="products.accept_cupon" checked>
                            </div>
                        </div>
                    </div>

                </x-layouts.section>

                <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-truck-fast pr-2"></i> Shipping & Courier
                        </div>
                    </x-slot>
                    <div>
                        <flux:input wire:model="products.shipping_note" :label="__('Shipping Note')" type="text"
                            :placeholder="__('Write something for buyer caution')" />
                    </div>
                </x-layouts.section>

                <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-plug pr-2"></i> Badges and Tags
                        </div>
                    </x-slot>

                </x-layouts.section>

                {{-- Attributes --}}
                <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-link pr-2"></i> Attributes
                        </div>
                    </x-slot>

                </x-layouts.section>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description"
                        class="block mt-1 w-full border rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        wire:model="products.description" rows="4" required>{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>

            {{-- right side, product cart overview --}}
            <div class="max-w-[260px] ms-3 hidden lg:block static top-[20px] ">
                {{-- <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-eye pr-2"></i> Product Overview
                        </div>
                    </x-slot>

                    <x-client.product-cart :product="(object)[
                                    'name' => $name ?? 'Product Name',
                                    'price' => $price ?? 0,
                                    'neet_price' => $neet_price ?? 0,
                                    'offer_type' => $offer_type ?? 0,
                                    'is_in_stock' => $in_stock ?? true,
                                    'image' => $thumbnail ? $thumbnail->temporaryUrl() : null,
                                    'description' => $short_description ?? 'Short description goes here...',
                                ]" />
                </x-layouts.section> --}}

                {{-- product thumbnail --}}
                <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-image pr-2"></i> Thumbnails
                        </div>
                    </x-slot>

                    @if ($newThumbnail)
                    <img src="{{$newThumbnail->temporaryURL()}}" style="height:150px" class="rounded shadow" alt="">
                    @else
                    <img src="{{asset('storage/' . $products['thumbnail'])}}" style="height:150px"
                        class="rounded shadow" alt="">

                    @endif
                    <p class="text-xs text-gray-400">250 x 250 thumbnail image</p>
                    <input type="file" wire:model.lazy="products.thumbnail" accept="image/*" max="1024"
                        class="mt-1 block w-full" />
                    @error('thumbnail')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                </x-layouts.section>

                {{-- product showcase --}}
                <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-image pr-2"></i> Showcase
                        </div>
                    </x-slot>

                    {{-- <x-input-file label="Thumbnail" error="thumbnail" name="thumbail">
                        @if ($thumbnail)
                        <img src="{{$thumbnail->temporaryURL()}}" style="height:150px" class="rounded shadow" alt="">
                        @endif
                        <p class="text-xs text-gray-400">250 x 250 thumbnail image</p>
                        <input type="file" wire:model.lazy="thumbnail" accept="image/*" max="1024"
                            class="mt-1 block w-full" />
                        @error('thumbnail')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </x-input-file> --}}
                </x-layouts.section>
                {{-- SEO --}}
                <x-layouts.section>
                    <x-slot name="header">
                        <div>
                            <i class="fas fa-globe pr-2"></i> SEO Setup
                        </div>
                    </x-slot>
                    <div>
                        <flux:input wire:model="products.seo_title" :label="__('SEO Title')" type="text"
                            :placeholder="__('SEO Title')" />
                        <flux:input wire:model="products.seo_keywords" :label="__('SEO Keyword')" type="text"
                            :placeholder="__('SEO Keyword')" />
                        <flux:input wire:model="products.seo_description" :label="__('SEO Description')" type="text"
                            :placeholder="__('SEO Description')" />
                        <flux:input wire:model="products.seo_tags" :label="__('SEO Tags')" type="text"
                            :placeholder="__('SEO Tags')" />
                        <flux:input wire:model="products.seo_thumbnail" :label="__('SEO Thumbnail')" type="file" />
                    </div>
                </x-layouts.section>

            </div>
        </div>
        <br>
        <x-primary-button type="button" wire:click='updateProduct'>
            <i class="fas fa-sync pr-2"></i> update and save
        </x-primary-button>
    </x-layouts.container>
</div>