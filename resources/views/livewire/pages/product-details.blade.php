<div>
    @section('title')
    Product Details
    @endsection
    {{-- Do your work, then step back. --}}

    <x-container>
        {{-- <div class="text-3xl my-3">Lorem ipsum dolor sit amet.</div> --}}
        <div class=" lg:flex items-start ">
            <div class="relative p-2 lg:w-1/2 relative">
                {{-- product image with multiple preview --}}
                <div class="p-4 flex justify-center items-center">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="h-96 rounded-xl shadow-xl mx-auto" src="{{asset('deshoj-vandar.jpg')}}"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="h-96 rounded-xl shadow-xl mx-auto"
                                    src="https://www.natures-nectar.com/cdn/shop/files/NaturenactorHoney.4_2048x.jpg?v=1720175331"
                                    alt="">
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    {{-- <img id="preview"
                        src="https://www.natures-nectar.com/cdn/shop/files/NaturenactorHoney.4_2048x.jpg?v=1720175331"
                        alt="" srcset="" class="h-96 rounded-lg shadow-xl"> --}}
                </div>
                <div class="my-2 border-t p-4 flex flex-wrap justify-start items-center space-x-2">
                    {{-- product image preview --}}
                    <img src="{{asset('deshoj-vandar.jpg')}}" class="w-12 h-12 rounded " alt="">
                    <img src="https://www.natures-nectar.com/cdn/shop/files/NaturenactorHoney.4_2048x.jpg?v=1720175331"
                        class="w-12 h-12 rounded " alt="">
                </div>

                {{-- display offer discount --}}
                <div class="absolute top-0 left-0 z-20 rounded px-2 py-1 bg-lime-400 text-white shadow-xl">
                    10% off
                </div>

                <div @class(["absolute top-0 left-0 z-20 w-full h-full bg-gray-200 bg-opacity-50 flex items-center
                    justify-center"])>
                    <div class="w-full bg-white text-center py-2 shadow-lg ">

                        <p class="text-center text-lg w-full text-gray-500 font-bold uppercase">Out of Stock</p>

                    </div>
                </div>
            </div>


            {{-- details --}}
            <div class="w-full mt-4 lg:w-1/2 p-5 self-start text-start w-">
                {{-- product other information --}}
                <a href="" wire:navigate class="rounded-full mb-3 flex text-gray-900">
                    Category
                </a>
                <h1 class="text-xl my-3 font-bold">Lorem ipsum dolor sit amet.</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum sunt, rem voluptatem fuga porro
                    totam
                    molestias accusantium vero iste sint, impedit illum. Cupiditate hic labore optio beatae iure aut
                    blanditiis.
                </p>
                <div class="bg-gray-200 text-gray-900 p-2 my-2 flex items-center">
                    {{-- alert icon --}}
                    <div class="w-2 h-4 px-2 mr-2 bg-gray-900 rounded"></div> Lorem ipsum dolor sit amet.
                </div>
                <div class="flex items-baseline my-4">
                    <p class="text-3xl font-bold text-gray-900"> <span class="text-3xl font-bolder">৳</span>
                        1200
                    </p>
                    <del>
                        <p class="text-md text-red-900 mx-2"> <span class="text-md">৳</span>
                            1400
                        </p>
                    </del>
                </div>

                <div class="flex space-x-2">

                    <x-nav-link type="btn-primary" class="w-full"
                        href="{{route('product.order', ['slug' => 'product-text-order'])}}">

                        <div class="flex items-center justify-between w-full">

                            <div> Buy Now </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </x-nav-link>

                    <x-nav-link type="btn-secondary">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-3 md:size-5">

                                <path
                                    d="M0 72C0 58.7 10.7 48 24 48L69.3 48C96.4 48 119.6 67.4 124.4 94L124.8 96L537.5 96C557.5 96 572.6 114.2 568.9 133.9L537.8 299.8C532.1 330.1 505.7 352 474.9 352L171.3 352L176.4 380.3C178.5 391.7 188.4 400 200 400L456 400C469.3 400 480 410.7 480 424C480 437.3 469.3 448 456 448L200.1 448C165.3 448 135.5 423.1 129.3 388.9L77.2 102.6C76.5 98.8 73.2 96 69.3 96L24 96C10.7 96 0 85.3 0 72zM160 528C160 501.5 181.5 480 208 480C234.5 480 256 501.5 256 528C256 554.5 234.5 576 208 576C181.5 576 160 554.5 160 528zM384 528C384 501.5 405.5 480 432 480C458.5 480 480 501.5 480 528C480 554.5 458.5 576 432 576C405.5 576 384 554.5 384 528zM336 142.4C322.7 142.4 312 153.1 312 166.4L312 200L278.4 200C265.1 200 254.4 210.7 254.4 224C254.4 237.3 265.1 248 278.4 248L312 248L312 281.6C312 294.9 322.7 305.6 336 305.6C349.3 305.6 360 294.9 360 281.6L360 248L393.6 248C406.9 248 417.6 237.3 417.6 224C417.6 210.7 406.9 200 393.6 200L360 200L360 166.4C360 153.1 349.3 142.4 336 142.4z" />
                            </svg>
                            {{-- <span class="ml-2">Add to Cart</span> --}}

                        </div>
                    </x-nav-link>
                </div>

                <hr class="my-2" />

                <div class="flex flex-wrap text-xs py-2">
                    <div class="px-3 py-2 border rounded inline-flex font-bold items-center">
                        {{-- check mark svg --}}
                        <div class="w-3 h-3 mr-3 bg-lime-900 rounded-full"></div>
                        Cash-On Delevery
                    </div>
                    <hr class="my-2" />
                    <div class="px-3 py-2 border rounded inline-flex font-bold items-center">
                        {{-- check mark svg --}}
                        <div class="w-3 h-3 mr-3 bg-red-900 rounded-full"></div>
                        Courier Delevery
                    </div>
                </div>
                <hr class="my-2" />
                <div class="md:flex">
                    <x-nav-link href="/">
                        save as wish list
                    </x-nav-link>
                </div>
            </div>
        </div>

        {{-- product description --}}
        <div class="rounded-xl bg-white w-full overflow-hidden">
            <x-accordion>

                <x-slot:title>
                    Product Description
                </x-slot:title>
                <x-slot:content>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cumque. Quisquam, voluptatum
                    voluptates. Doloribus, cumque. Quisquam, voluptatum voluptates.
                </x-slot:content>
            </x-accordion>

            <x-accordion>
                <x-slot:title>
                    Product Specification
                </x-slot:title>
                <x-slot:content>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cumque. Quisquam, voluptatum
                    voluptates. Doloribus, cumque. Quisquam, voluptatum voluptates.
                </x-slot:content>
            </x-accordion>
        </div>

        {{-- related products --}}
        <hr class="my-1" />
        @php
        $products = Array(
        (object)[
        'id' => 1,
        'name' => 'Honey',
        'description' => 'সুন্দরবনের খাঁটি মধু',
        'price' => 29.99,
        'image' => "https://www.natures-nectar.com/cdn/shop/files/NaturenactorHoney.4_2048x.jpg?v=1720175331",
        'is_in_stock' => 10,
        ],
        (object)[
        'id' => 2,
        'name' => 'Oil',
        'description' => 'Pure coconul oil from Bangladesh.',
        'price' => 39.99,
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8jgNf-EAEEq1Dtwpm6XCIjQMbfsnawcSj5A&s',
        'is_in_stock' => 0,
        ],
        (object)[
        'id' => 3,
        'name' => 'Product 3',
        'description' => 'This is a description for product 3.',
        'price' => 49.99,
        'image' => 'https://placehold.co/200x150/lime/white',
        'is_in_stock' => 20,
        ],
        (object)[
        'id' => 4,
        'name' => 'Product 4',
        'description' => 'This is a description for .',
        'price' => 59.99,
        'image' => 'https://placehold.co/200x150/lime/white',
        'is_in_stock' => 0,
        ]
        );
        @endphp
        <div class="my-12 grid grid-cols-2 md:grid-cold-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <x-client.product-cart :$product />
            @endforeach
        </div>
    </x-container>


    <script>
        function previewImage(element){
            const file = element.src;
            // console.log(file);
            document.getElementById('preview').src = file;
            // const reader = new FileReader();
            // reader.onload = () => {
            //     const preview = document.getElementById('preview');
            //     preview.src = reader.result;
            // };
            // reader.readAsDataURL(file);
                
        }
    </script>
</div>