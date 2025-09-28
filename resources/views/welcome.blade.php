@extends('layouts.client')

@section('title')
Hello {{ config('app.name', 'Deshoj Vandar') }}
@endsection

@section('viewport')

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="https://placehold.co/1400x600/indigo/white" alt="">
        </div>
        <div class="swiper-slide">
            <img src="https://placehold.co/1400x600/green/white" alt="">
        </div>
        <div class="swiper-slide">
            <img src="https://placehold.co/1400x600/gray/white" alt="">
        </div>
        <div class="swiper-slide">
            <img src="https://placehold.co/1400x600/pink/white" alt="">
        </div>
        <div class="swiper-slide">
            <img src="https://placehold.co/1400x600/white/black" alt="">
        </div>
        <div class="swiper-slide">
            <img src="https://placehold.co/1400x600/blue/white" alt="">
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<x-container>

    {{-- feature products card design --}}
    @php
    $products = Array(
    (object)[
    'id' => 1,
    'name' => 'Honey',
    'description' => 'সুন্দরবনের খাঁটি মধু',
    'price' => 29.99,
    'image' => "https://www.natures-nectar.com/cdn/shop/files/NaturenactorHoney.4_2048x.jpg?v=1720175331",
    "is_in_stock" => 10,
    ],
    (object)[
    'id' => 2,
    'name' => 'Oil',
    'description' => 'Pure coconul oil from Bangladesh.',
    'price' => 39.99,
    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8jgNf-EAEEq1Dtwpm6XCIjQMbfsnawcSj5A&s',
    "is_in_stock" => 0,
    ],
    (object)[
    'id' => 3,
    'name' => 'Product 3',
    'description' => 'This is a description for product 3.',
    'price' => 49.99,
    'image' => 'https://placehold.co/250x250/white/lime',
    "is_in_stock" => 20,
    ],
    (object)[
    'id' => 4,
    'name' => 'Product 4',
    'description' => 'This is a description for .',
    'price' => 59.99,
    'image' => 'https://placehold.co/250x250/white/lime',
    'is_in_stock' => 5,
    ],


    );
    @endphp
    <div class="py-8">
        <div class="flex justify-between items-center py-8">
            <h2 class="text-2xl font-bold "> Products</h2>

            {{-- newest or oldest --}}
            <div>
                <flux:select varient="listbox" indicator="checkbox" wire:model="" placeholder="Chose Type ..">
                    <flux:select.option value="desc"> Newest </flux:select.option>
                    <flux:select.option value="asc"> Oldest </flux:select.option>
                </flux:select>
            </div>

        </div>
        <div class="grid grid-cols-2 md:grid-cold-2 lg:grid-cols-5 gap-3">
            @foreach ($products as $product)
            <x-client.product-cart :$product />
            @endforeach
        </div>
    </div>
    {{-- <div class="text-center py-4">
        <x-primary-button>
            <div class="flex items-center justify-center">
                <div> View All Products </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </x-primary-button>
    </div> --}}


    {{-- <flux:navlist.item href="" wire:navigate>{{ __('Profile') }}</flux:navlist.item> --}}
</x-container>

<x-container>
    <div class="py-8 hidden">
        <h2 class="text-2xl font-bold mb-6">Latest Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="relative bg-white dark:bg-gray-800 rounded-lg transition duration-150 ease-in-out">
                {{-- <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" --}} <a href=""
                    class="rounded">

                <img src="{{  asset('deshoj-vandar.jpg') }}" alt="{{ $product->name }}"
                    class="w-full h-56 object-cover rounded p-4">
                </a>

                <div class="p-4 h-40 flex flex-col justify-end items-start">
                    <div class=" text-sm font-semibold px-2 rounded-lg shadow inline bg-green-100">
                        {{
                        $product->name
                        }}
                    </div>
                    <a href="" class="text-gray-600 dark:text-gray-400 my-1">{{ $product->description }}</a>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2"> <span
                            class="text-3xl font-bolder">৳</span>
                        {{ $product->price }}
                        <del></del>
                    </p>
                    <div class="flex justify-between w-full items-center">
                        <x-nav-link type="btn-primary">

                            <div class="flex items-center">

                                <div> Order Now </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </div>
                        </x-nav-link>
                        <x-nav-link type="btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-3 md:size-5">

                                <path
                                    d="M0 72C0 58.7 10.7 48 24 48L69.3 48C96.4 48 119.6 67.4 124.4 94L124.8 96L537.5 96C557.5 96 572.6 114.2 568.9 133.9L537.8 299.8C532.1 330.1 505.7 352 474.9 352L171.3 352L176.4 380.3C178.5 391.7 188.4 400 200 400L456 400C469.3 400 480 410.7 480 424C480 437.3 469.3 448 456 448L200.1 448C165.3 448 135.5 423.1 129.3 388.9L77.2 102.6C76.5 98.8 73.2 96 69.3 96L24 96C10.7 96 0 85.3 0 72zM160 528C160 501.5 181.5 480 208 480C234.5 480 256 501.5 256 528C256 554.5 234.5 576 208 576C181.5 576 160 554.5 160 528zM384 528C384 501.5 405.5 480 432 480C458.5 480 480 501.5 480 528C480 554.5 458.5 576 432 576C405.5 576 384 554.5 384 528zM336 142.4C322.7 142.4 312 153.1 312 166.4L312 200L278.4 200C265.1 200 254.4 210.7 254.4 224C254.4 237.3 265.1 248 278.4 248L312 248L312 281.6C312 294.9 322.7 305.6 336 305.6C349.3 305.6 360 294.9 360 281.6L360 248L393.6 248C406.9 248 417.6 237.3 417.6 224C417.6 210.7 406.9 200 393.6 200L360 200L360 166.4C360 153.1 349.3 142.4 336 142.4z" />
                            </svg>
                        </x-nav-link>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-container>

<x-container>
    {{-- users review section --}}
    <div class="py-8 hidden">
        <h2 class="text-2xl font-bold mb-6">User Reviews</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div
                class="h-48 flex flex-col justify-between bg-white dark:bg-gray-800 rounded-lg shadow hover:shoadow-xl transition p-4">
                <div class="flex items-center ">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                        class="w-16 h-16 object-cover rounded-full mr-4">
                    <div class="px-2">
                        <h3 class="text-lg font-bold ">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-900 dark:text-gray-100">${{ $product->price }}</p>
                    </div>
                </div>
                <p class="text-md text-gray-600 dark:text-gray-400 my-2">{{ $product->description }}</p>
                <div class="text-end">
                    <p class="text-xs text-gray-600">Review on 25 July, 2025</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-container>

<hr class="my-1" />

<x-container>
    {{-- blog section --}}
    <div class="py-8">
        <h2 class="text-2xl font-bold mb-6">Latest Blogs</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow hover:shoadow-xl transition p-4">
                <img src="{{  $product->image }}" alt="{{ $product->name }}"
                    class="w-full h-48 object-cover rounded-md mb-4">

                <div class="flex flex-col justify-end items-start">
                    <p
                        class="text-xs font-semibold mb-2 absolute top-3 right-3 rounded bg-green-900 text-white px-2 py-1">
                        {{
                        $product->name
                        }}
                    </p>
                    <p class="text-xs text-gray-900 font-bold">
                        10 July, 2025
                    </p>
                    <h6 class="text-gray-600 dark:text-gray-400 mb-2">
                        {{
                        Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore ipsum, quos sed
                        minima odio fugit nemo explicabo quam
                        ullam? Velit eum minus sed, libero ad excepturi mollitia hic fuga minima deleniti dicta, in
                        officiis ea voluptatum
                        molestiae exercitationem debitis assumenda beatae doloremque recusandae ab. Saepe asperiores
                        nesciunt officiis? Velit,
                        consequuntur.', '100', '...')
                        }}
                    </h6>
                    <div class="flex justify-between items-center">
                        <x-nav-link type="btn-secondary">
                            <div class="flex items-center">
                                <div> Read More </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </div>
                        </x-nav-link>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-container>

@endsection