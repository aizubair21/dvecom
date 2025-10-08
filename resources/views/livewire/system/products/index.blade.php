<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-slot name="header">
        Products
    </x-slot>

    <x-layouts.container>
        <x-layouts.section>
            <x-slot name="header">

                <div class="flex space-x-2">

                    {{-- <x-secondary-button>
                        Filter <i class="fas fa-filter ml-2"></i>
                    </x-secondary-button> --}}

                    <select wire:model.live="status" id="" class="px-2 py-1 rounded-md border">
                        <option value="All">All</option>
                        <option value="Active">Live</option>
                        <option value="Draft">Draft</option>
                    </select>

                </div>
                <x-nav-link href="{{ route('system.products.create') }}" type="btn-primary">
                    <i class="fas fa-plus pr-2"></i> Product
                </x-nav-link>
            </x-slot>

            {{-- table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Neet
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Create
                            </th>
                            <th scope="col" class="relative px-6 py-3">

                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="relative flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://via.placeholder.com/150' }}"
                                            alt="">
                                        <span @class(['absolute top-0 left-0 font-bold text-xs px-1 rounded-full
                                            bg-lime-900 text-white', 'hidden'=>
                                            !$product->hasDiscount()])>
                                            D
                                        </span>
                                    </div>
                                    <div class="ml-4">
                                        <a wire:navigate href="{{route('product.details', ['slug' => $product->slug])}}"
                                            class="text-sm font-medium text-gray-700 hover:text-gray-900">
                                            {{ Str::limit($product->name, 20, '...') }}
                                        </a>
                                        <div class="text-xs text-gray-500">
                                            {{ $product->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $product->neet_price }}
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm">

                                ৳ {{ number_format($product->price, 2) }}
                                <div @class(['hidden'=> !$product->hasDiscount()])>
                                    <hr>
                                    <div class="text-xs flex items-center text-gray-500">
                                        {{ $product->discount }} | save {{$product->discount_save}} TK |
                                        {{$product->discountOff()}}%
                                    </div>
                                </div>

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $product->stock }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($product->status == 'Active')
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Live
                                </span>
                                @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Draft
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                {{$product->created_at->diffForHumans()}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-nav-link href="{{route('system.products.edit', ['id' => $product->id])}}">
                                    <i class="fas fa-pen"></i>
                                </x-nav-link>
                                <x-nav-link href="{{route('system.products.edit', ['id' => $product->id])}}">
                                    <i class="fas fa-trash text-red-400"></i>
                                </x-nav-link>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{$products->links()}}
                </div>
            </div>
        </x-layouts.section>
    </x-layouts.container>

</div>