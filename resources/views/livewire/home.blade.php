<div>
    {{-- Do your work, then step back. --}}
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
    </x-container>
</div>