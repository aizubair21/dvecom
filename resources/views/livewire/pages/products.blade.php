<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @section('title')
    Products
    @endsection

    <div class=" bg-white p-3">
        <x-container>
            <div class="flex items-center justify-between">
                <h1>Shops</h1>
                <div>
                    <x-primary-button>
                        filter
                    </x-primary-button>
                </div>
            </div>
        </x-container>
        {{--
        <hr class="my-2" /> --}}
    </div>

    <x-container>
        <div class="flex items-start justify-start">

            {{-- left asside --}}
            <div class="p-3 w-[200px] border-r hidden lg:block">
                <x-ClientProductPageAsside />
            </div>

            {{-- right main content --}}
            <div class="p-3 w-full">

                @if (count($products))

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                    @foreach ($products as $product)
                    {{-- {{$product->discountOff()}} --}}
                    <x-client.product-cart :$product />
                    @endforeach
                </div>
                @else
                <div class="w-full p-2 bg-white">
                    No Products Found !
                </div>
                @endif
            </div>
    </x-container>

    <div class="bg-white">
        <x-container>

        </x-container>
    </div>
</div>