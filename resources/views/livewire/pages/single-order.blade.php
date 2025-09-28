<div>
    {{-- The whole world belongs to you. --}}
    @section('title')
    Order
    @endsection

    <x-container>
        <div class="">
            <div class="lg:flex justify-between items-start ">

                <div class="lg:sticky top-0 w-full max-w-sm bg-white rounded-lg shadow-lg">
                    {{-- <div class="p-4 text-2xl w-full">Checkout</div> --}}
                    <div class="flex justify-between items-center ">
                        <div class="text-lg font-bold p-6">
                            Checkout (1 items)
                        </div>

                        <div class="w-18 text-center rounded p-6">
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100"> <span
                                    class="text-xl font-bolder">৳</span>
                                1200
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="flex items-start mb-1 p-6">
                        <div class="w-12 rounded">
                            <img src="{{asset('deshoj-vandar.jpg')}}" class="w-12 rounded" alt="">
                        </div>
                        <div class="px-3 flex-1 ">
                            <div>
                                Lorem ipsum dolor sit amet consectetur elit.
                            </div>
                            <div class="md:flex items-baseline my-1">
                                <p class="text-md text-gray-600 dark:text-gray-100"> <span class="text-lg ">৳</span>
                                    1200
                                </p>
                                <del>
                                    <p class="text-sm text-gray-600 dark:text-gray-100 md:mx-2"> <span
                                            class="text-sm">৳</span>
                                        1400
                                    </p>
                                </del>
                            </div>
                            <div class="rounded-md border inline-flex items-center mt-2 py-1">
                                <x-nav-link> - </x-nav-link>
                                <div class="w-8 text-center">
                                    10
                                </div>
                                <x-nav-link> + </x-nav-link>
                            </div>

                            <x-nav-link type="btn-danger">
                                Remove
                            </x-nav-link>
                        </div>
                        <div class="w-18 h-auto">
                            <p class="w-full text-lg text-gray-900 dark:text-gray-100"> <span
                                    class=" font-bolder">৳</span>
                                15200
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

                    <hr>
                    <div class="p-3 flex justify-between items-center">
                        <x-nav-link type="btn-primary">Add More Item </x-nav-link>
                        <x-nav-link type="btn-secondary"> Clear</x-nav-link>
                    </div>

                </div>

                <div class="w-full lg:w-1/2 bg-white rounded-lg shadow mt-4 lg:mt-0">
                    <div class="p-6">
                        {{-- <div class="pb-6 text-gray-900 font-bold text-2xl w-full text-center">Order Form
                        </div> --}}
                        <div class="text-lg font-bold mb-1">Contact Information</div>
                        <x-text-input type="number" autofocus class="p-2 rounded-lg w-full"
                            placeholder="Phone Number" />
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
                            <x-text-input type="text" class="p-2 rounded-lg w-full" placeholder="Your Name" />
                        </div>
                        <hr class="my-2" />

                        <div class="md:flex items-center md:space-x-2">
                            <div class="mb-2 w-full">
                                <x-text-input type="text" class="p-2 rounded-lg w-full" placeholder="District" />
                            </div>
                            <div class="mb-2 w-full">
                                <x-text-input type="text" class="p-2 rounded-lg w-full" placeholder="Thana / Upozila" />
                            </div>
                        </div>

                        <div class="md:flex items-center md:space-x-2">
                            <div class="mb-2 w-full">
                                <x-text-input type="text" class="p-2 rounded-lg w-full" placeholder="Village" />
                            </div>
                            <div class="mb-2 w-full">
                                <x-text-input type="text" class="p-2 rounded-lg w-full" placeholder="ZIP" />
                            </div>
                        </div>

                        <div class="mb-2">
                            <x-input-label>Full Address</x-input-label>
                            <textarea name="" id="" cols="3" class="w-full rounded-md border border-gray-300 p-2"
                                placeholder="Your Full Address"></textarea>
                            <div class="text-sm pb-1 text-gray-700">
                                Stay patience, We use this address to send purcel to you.
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-6">
                        <div class="text-lg font-bold mb-1">Payment Method</div>
                        <div class="flex items-center p-2 mb-1">
                            <input type="checkbox" checked name="payment_method" id="cash_on_delivery"
                                value="cash_on_delivery" class="mr-2 w-6 h-6">
                            <label for="cash_on_delivery">Cash on Delivery</label>
                        </div>
                    </div>

                    <hr />
                    <div class="px-6 py-3 text-center">
                        <x-primary-button class="">
                            confirm
                        </x-primary-button>
                    </div>
                </div>

            </div>
        </div>
    </x-container>
</div>