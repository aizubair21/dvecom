<div>
    {{-- The whole world belongs to you. --}}
    @section('title')
    Order
    @endsection

    <x-container>
        <div class="">
            <div class="py-2 mb-2 text-3xl border-b mt-5">
                Checkout & Confirm Order
            </div>
            <div @class(["lg:flex justify-between items-start", 'hidden'=> !$products->name])>



                <div class="w-full lg:w-1/2 bg-white rounded-lg shadow mt-4 lg:mt-0">
                    <form wire:submit.prevent='confirmOrder'>

                        <div class="p-6">
                            {{-- <div class="pb-6 text-gray-900 font-bold text-2xl w-full text-center">Order Form
                            </div> --}}
                            <div class="text-lg font-bold mb-1">Contact Information</div>
                            <x-text-input type="number" wire:model.live='phone' autofocus class="p-2 rounded-lg w-full"
                                placeholder="Phone Number" />
                            <div>
                                @error('phone')
                                <p class="text-red-900"> {{$message}} </p>
                                @enderror
                            </div>
                            <h6 class="mb-1 text-sm">
                                We'll use this to send you details and update about your order.
                            </h6>
                        </div>
                        <hr />
                        <div class="p-6">
                            <div class="text-lg font-bold mb-1">Billing Address</div>
                            <h6 class="mb-2">
                                Enter the billing addreass to receive your order.
                            </h6>
                            <div class="mb-2">
                                <x-text-input type="text" wire:model.live='name' class="p-2 rounded-lg w-full"
                                    placeholder="Your Name" />
                            </div>
                            <div>
                                @error('name')
                                <p class="text-red-900"> {{$message}} </p>
                                @enderror
                            </div>
                            <hr class="my-2" />

                            <div class="md:flex items-center md:space-x-2">
                                <div class="mb-2 w-full">
                                    <x-text-input type="text" wire:model.lazy='districr' class="p-2 rounded-lg w-full"
                                        placeholder="District" />
                                    <div>
                                        @error('district')
                                        <p class="text-red-900"> {{$message}} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 w-full">
                                    <x-text-input type="text" wire:model.lazy='thana' class="p-2 rounded-lg w-full"
                                        placeholder="Thana / Upozila" />
                                    <div>
                                        @error('upozila')
                                        <p class="text-red-900"> {{$message}} </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="md:flex items-center md:space-x-2">
                                <div class="mb-2 w-full">
                                    <x-text-input type="text" wire:model.lazy='village' class="p-2 rounded-lg w-full"
                                        placeholder="Village" />
                                    <div>
                                        @error('village')
                                        <p class="text-red-900"> {{$message}} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 w-full">
                                    <x-text-input type="text" wire:model.lazy='zip' class="p-2 rounded-lg w-full"
                                        placeholder="ZIP" />
                                </div>
                            </div>

                            <div class="mb-2">
                                <x-input-label>Full Address</x-input-label>
                                <textarea name="address" id="buyer_address" wire:model.lazy='address' cols="5"
                                    class="w-full rounded-md border border-gray-300 p-2"
                                    placeholder="Your Full Address"></textarea>
                                <div class="text-sm pb-1 text-gray-700">
                                    Stay patience, We use this address to send purcel to you.
                                </div>
                                <div>
                                    @error('address')
                                    <p class="text-red-900"> {{$message}} </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr />

                        {{-- payment --}}
                        <div class="p-6">
                            <div class="text-lg font-bold mb-1">Payment Method</div>
                            <div @class(['flex items-center p-2 mb-1', 'hidden'=> !$products->cod])>
                                <input type="checkbox" checked name="payment_method" id="cash_on_delivery"
                                    value="cash_on_delivery" class="mr-2 w-6 h-6">
                                <label for="cash_on_delivery">Cash on Delivery</label>
                            </div>
                            <p class="bg-gray-100 px-2 py-1 text-xs">
                                Payment based on your shipping address. Be sure via a call before confirm order.
                            </p>
                        </div>

                        <hr />
                        <div class="px-6 py-3 text-center">
                            <x-primary-button wire:loading.disabled type="submit" class="text-center text-lg w-full">
                                <i class="fas fa-shpping-cart mr-2"></i> confirm {{$total}} TK
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <div class="lg:sticky top-0 w-full max-w-sm bg-white rounded-lg shadow-lg">
                    {{-- <div class="p-4 text-2xl w-full">Checkout</div> --}}
                    <div class="flex justify-between items-center ">
                        <div class="text-lg font-bold p-6">
                            Checkout (1 items)
                        </div>

                        <div class="w-18 text-center rounded p-6">
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100"> <span
                                    class="text-xl font-bolder">৳</span>
                                {{$total}}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="flex items-start mb-1 p-6">
                        <div class="w-12 rounded">
                            <img src="{{asset('storage/' . $products?->thumbnail)}}" class="w-12 rounded" alt="">
                        </div>
                        <div class="px-3 flex-1 ">
                            <a href="{{route('product.details', ['slug' => $products->slug])}}" wire:navigate
                                class="rounded-full flex text-sm font-normal text-gray-600 hover:text-gray-900">
                                {{$products->name}}
                            </a>
                            <div class="flex items-baseline mb-1">
                                <p class="text-lg font-bold text-gray-500"> <span class="text-lg font-bolder">৳</span>
                                    {{$products->total}}
                                </p>
                                <del @class(['hidden'=> !$products->hasDiscount()])>
                                    <p class="text-sm text-gray-900 dark:text-gray-100 md:mx-2"> <span
                                            class="text-sm">৳</span>
                                        {{ $products->discounts }}
                                    </p>
                                </del>
                            </div>
                            
                            <div class="rounded-md border inline-flex items-center mt-2 py-1">
                                <button wire:click='decreaseQty' type="button"
                                    class="px-2 rounded text-gray-500 border-1 text-sm"> <i class="fas fa-minus"></i>
                                </button>
                                <div class="w-8 text-center">
                                    {{$qty}}
                                </div>
                                {{-- <button> </button> --}}
                                <button wire:click='increaseQty' type="button"
                                    class="px-2 rounded text-gray-500 border-1 text-sm"> <i class="fas fa-plus"></i>
                                </button>
                            </div>

                            <button type="button" class="p-2 rounded border bg-red-100 text-red-900 text-xs">
                                <i class="fas fa-trash"> </i>
                            </button>
                        </div>
                        <div class="w-18 h-auto">
                            <p class="w-full text-lg text-gray-900 dark:text-gray-100"> <span
                                    class=" font-bolder">৳</span>
                                {{$subTotal}}
                            </p>
                        </div>
                    </div>

                    {{-- <div class="flex justify-between items-center p-3">
                        <div>
                            Sub-Total
                        </div>
                        <div>
                            <p class="text-lg font-bold text-gray-900 dark:text-gray-100"> <span
                                    class="text-xl font-bolder">৳</span>
                                1200
                            </p>
                        </div>
                    </div> --}}

                    {{--
                    <hr>
                    <div class="p-3 flex justify-between items-center">
                        <x-nav-link type="btn-primary">Add More Item </x-nav-link>
                        <x-nav-link type="btn-secondary"> Clear</x-nav-link>
                    </div> --}}

                </div>

            </div>
        </div>
    </x-container>
</div>