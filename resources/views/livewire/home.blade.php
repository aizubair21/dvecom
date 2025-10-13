<div>
    {{-- Do your work, then step back. --}}
    {{-- @php
    dd($carousel)
    @endphp --}}
    <style>
        @media only screen and (max-width: 570px) {
            .swiper {
                height: 165px !important;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                font-size: 15px;
                border-radius: 50%;
                border: 1px solid gray;
                padding: 10px;
                /* background-color:  */
            }
        }

        @media (min-width:570) and (max-width: 768px) {
            .swiper {
                height: 220px !important;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                font-size: 20px;
                border-radius: 50%;
                border: 1px solid gray;
                padding: 10px;
                /* background-color:  */
            }
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 25px;
            border-radius: 50%;
            border: 1px solid gray;
            padding: 10px;
            /* background-color:  */
        }

        .swiper-button-next::after:hover,
        .swiper-button-prev::after:hover {
            background-color: gray;
        }
    </style>
    @if ($carousel)

    <div class="swiper mySwiper relative">
        <div class="swiper-wrapper">
            @foreach ($carousel as $slider)
            @foreach ($slider->slides as $item)

            <div class="swiper-slide relative">
                <img style="width:100%!important; max-height:550px" class="object-cover"
                    src="{{asset('storage/'. $item->image)}}" alt="">

                @if ($item->main_title)

                <div class="p-6 ms-12 w-[350px] absolute left-0 inset-y-0 flex flex-col justify-center bg-gray-100/50">
                    <img src="{{asset('deshoj-vandar.jpg')}}" class="size-14 p-1 bg-gray-200 rounded shadow mb-2"
                        alt="">
                    <h1 class="text-3xl mb-4 font-bold text-white uppercase"> {{$item->main_title}} </h1>
                    {{-- <x-nav-link> Show Now <i class="fas fa-angle-right ps-3"></i> </x-nav-link> --}}
                </div>
                @endif
                <div class="absolute top-0 size-16 p-1 bg-white rounded-full shadow-lg"
                    style="left: 50%; transform:translateX(-50%)">
                    <img src="{{asset('deshoj-vandar.jpg')}}" class="size-14 rounded-full shadow" alt="">
                </div>
            </div>
            @endforeach
            @endforeach
            {{-- <div class="swiper-slide">
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
            </div> --}}
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    @endif


    <x-container>
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
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                @foreach ($products as $product)
                {{-- {{$product->discountOff()}} --}}
                <x-client.product-cart :$product />
                @endforeach
            </div>
        </div>
        <br>
        <div class="text-center">
            <x-nav-link type="btn-primary" href="{{route('products')}}">
                All Products <i class="fas fa-angle-right ms-3"></i>
            </x-nav-link>
        </div>
    </x-container>
</div>