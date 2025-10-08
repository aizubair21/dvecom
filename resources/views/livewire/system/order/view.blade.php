<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-slot name="header">
        Order Details #{{$id}}, <div class=" text-indigo-900 font-bold">{{$order->total}} TK</div>
    </x-slot>

    <x-layouts.container>
        <div class="flex justify-between items-start px-4">
            <div class="order-info">

                <div>Order ID: {{ $order->id }}</div>
                <div>Date: <span class="text-xs"> {{ $order->created_at->toDayDateTimeString() }}</span> </div>

                {{-- <x-nav-link-btn href="{{route('vendor.order.cprint', ['order' => $order->id])}}">Print
                </x-nav-link-btn> --}}
                {{-- <a target="_blank" href="{{route('admin.order.print')}}" class="btn btn-sm btn-outline-primary"> <i
                        class="fas fa-print pe-2"></i> Print</a>
                <a target="_blank" href="{{route('admin.order.print', ['id' => $order->id, 'target' => 'excel'])}}"
                    class="btn btn-sm btn-outline-primary"> <i class="fab fa-excel pe-2"></i> Excel</a> --}}
                {{-- <table class="table"></table> --}}
            </div>
            <div class="order-total text-end mb-4">
                <table class="table">
                    <tr>

                        <p>
                            <strong>
                                @if ($order->isAuth())
                                <strong> {{$order->buyer?->name ?? "N\A"}} </strong>
                                @else
                                <strong>Guest</strong>
                                @endif
                            </strong>
                            <br>
                            {{$order->address}}
                            <br>
                            {{$order->phone}}


                        </p>
                    </tr>
                </table>
            </div>
        </div>

        <x-layouts.section>

            <x-slot name="header">
                @if ($order->status == 'Cancelled')
                <div class="p-2 border rounded bg-red-50">
                    <i class="fas fa-bell px-2 text-red-900"></i> Order has been cancelled by the buyer !
                </div>
                @else
                <div class="md:flex justify-between items-center space-y-2 w-full overflow-hidden overflow-x-scroll">
                    <div>

                        @if ($order->status == 'Confirm')
                        <div class="bg-green-900 text-white p-2 rounded shadow">
                            Confirmed !
                        </div>
                        @endif

                        @if ($order->status == 'Pending')
                        <x-primary-button @click="$dispatch('open-modal', 'order-accept-modal')">
                            Accept order
                        </x-primary-button>
                        @else
                        <div class="mb-2 flex gap-2">
                            <div wire:click="updateOrdertatusTo('Pending')" @class(["p-2 px-3 rounded-md cursor-pointer
                                text-gray-600 border-gray-600 text-center", 'bg-indigo-900 text-white'=>
                                in_array($order->status, ['Pending', 'Accept', 'Picked', 'Delivery', 'Delivered',
                                'Confirm']) , 'bg-gray-100' => $order->status == 'Pending']) title="Buyer placed the
                                order.
                                Order in Pending">Placed
                                <br>
                                <div @class([in_array($order->status, ['Pending','Accept', 'Picked', 'Delivery',
                                    'Delivered', 'Confirm']) ? 'block' : 'hidden'])>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div wire:click="updateOrdertatusTo('Accept')" @class(["p-2 px-3 rounded-md cursor-pointer
                                text-gray-600 border-gray-600 text-center", 'bg-indigo-900 text-white'=>
                                in_array($order->status, ['Accept', 'Picked', 'Delivery', 'Delivered', 'Confirm']) ,
                                'bg-gray-100' => $order->status == 'Pending']) title="Accept the order for
                                process">Accept
                                <br>
                                <div @class([in_array($order->status, ['Accept', 'Picked', 'Delivery', 'Delivered',
                                    'Confirm']) ? 'block' : 'hidden'])>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div wire:click="updateOrdertatusTo('Picked')" @class(["p-2 px-3 rounded-md cursor-pointer
                                text-gray-600 border-gray-600 text-center", 'bg-indigo-900 text-white'=>
                                in_array($order->status, [ 'Picked', 'Delivery', 'Delivered', 'Confirm']) ,
                                'bg-gray-100'
                                => $order->status == 'Accept']) title="Find and collect the product">Picked
                                <br>
                                <div @class([in_array($order->status, ['Picked', 'Delivery', 'Delivered', 'Confirm']) ?
                                    'block' : 'hidden'])>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div wire:click="updateOrdertatusTo('Delivery')" @class(["p-2 px-3 rounded-md cursor-pointer
                                text-gray-600 border-gray-600 text-center", 'bg-indigo-900 text-white'=>
                                in_array($order->status, ['Delivery', 'Delivered', 'Confirm']) , 'bg-gray-100' =>
                                $order->status == 'Picked']) title="product shipped to rider or courier.">Delivery
                                <br>
                                <div @class([in_array($order->status, ['Delivery', 'Delivered', 'Confirm']) ? 'block' :
                                    'hidden'])>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div wire:click="updateOrdertatusTo('Delivered')" @class(["p-2 px-3 rounded-md
                                cursor-pointer text-gray-600 border-gray-600 text-center", 'bg-indigo-900 text-white'=>
                                in_array($order->status, ['Delivered', 'Confirm']) , 'bg-gray-100' => $order->status
                                ==
                                'Delivery']) title="product delivered to the buyer.and buyer successfully received the
                                order">Delivered
                                <br>
                                <div @class([in_array($order->status, ['Delivered', 'Confirm']) ? 'block' : 'hidden'])>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div wire:click="updateOrdertatusTo('Confirm')" @class(["p-2 px-3 rounded-md cursor-pointer
                                text-gray-600 border-gray-600 text-center", 'bg-indigo-900 text-white'=> $order->status
                                ==
                                'Confirm' , 'bg-gray-100' => $order->status == 'Delivered'])>Confirm
                                <br>
                                <div @class([$order->status == 'Confirm' ? 'block' : 'hidden'])>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                    <div>

                        <div class="mb-2 flex gap-2">
                            <div wire:click="updateOrdertatusTo('Hold')" @class(["p-2 px-3 rounded-md cursor-pointer
                                text-gray-600 border-gray-600 text-center", 'bg-indigo-900 text-white'=> $order->status
                                ==
                                'Hold' , 'bg-gray-100' => $order->status == 'Delivered'])>Hold
                                <br>
                                <div @class([$order->status == 'Hold' ? 'block' : 'hidden'])>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div wire:click="updateOrdertatusTo('Reject')" @class(["p-2 px-3 rounded-md cursor-pointer
                                text-gray-600 border-gray-600 text-center", 'bg-indigo-900 text-white'=> $order->status
                                ==
                                'Reject' , 'bg-gray-100' => $order->status == 'Delivered'])>Reject
                                <br>
                                <div @class([$order->status == 'Reject' ? 'block' : 'hidden'])>
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>

                        @if ($order->status == 'Rejecte')
                        <x-danger-button> Order Cancelled </x-danger-button>
                        @endif
                    </div>

                </div>
                @endif
                <br>
            </x-slot>

            <p class="mb-2">Order Items</p>
            <x-table>

                <thead>
                    <th>#</th>
                    <th>ID</th>
                    <th></th>
                    <th>Product</th>
                    <th>Unit</th>
                    <th>Neet Price</th>
                    <th>Sel Price</th>
                    <th>Total</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$item->id }}</td>
                        <td class="align-right">
                            <img src="{{asset('storage/' . $item->product?->thumbnail)}}"
                                class="w-8 h-8 rounded-full shadow mr-3" alt="">

                        </td>
                        <td>
                            {{-- <div class="md:flex items-center">
                                <img src="{{asset('storage/' . $item->product?->thumbnail)}}"
                                    class="w-8 h-8 rounded-full shadow mr-3" alt="">
                                <div>
                                    <a href="{{route('product.details', ['slug' => $item->product?->slug])}}"
                                        class="text-gray-700 hover:text-gray-900 pointer-cursor">
                                        {{$item->product?->name ?? "N\A"}}
                                    </a>

                                </div>
                            </div> --}}
                            <a wire:navigate href="{{route('product.details', ['slug' => $item->product?->slug])}}"
                                class="text-gray-700 hover:text-gray-900 pointer-cursor">
                                {{$item->product?->name ?? "N\A"}}
                            </a>
                        </td>
                        <td>
                            {{$item->qty}}
                        </td>
                        <td>
                            {{$item->product?->neet_price}}
                        </td>
                        <td>
                            <div class="md:flex items-baseline mb-2">
                                <p class="text-md font-bold text-gray-900 dark:text-gray-100"> <span
                                        class="text-md font-bolder">৳</span>
                                    {{ $item->product?->total }}
                                </p>
                                <del @class(['hidden'=> !$item->product?->hasDiscount()])>
                                    <p class="text-sm text-gray-900 dark:text-gray-100 md:mx-2"> <span
                                            class="text-sm">৳</span>
                                        {{ $item->product?->discounts }}
                                    </p>
                                </del>
                            </div>
                        </td>
                        <td>
                            {{$item->total}}
                        </td>
                        <td>
                            <div @class(['rounded-full p-1 shadow bg-lime-600 text-white hidden', 'block'=>
                                $item->product?->hasDiscount()])>D</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <hr />
                <tfooter>
                    <tr class="borddr-t">
                        <td colspan="4" class="text-left"> {{$order->items?->count()}} Products </td>
                        <td colspan="3"> {{$order->items?->sum('qty')}} </td>
                        <td colspan="3" class="font-bold"> {{$order->items?->sum('total')}} </td>
                    </tr>
                </tfooter>
            </x-table>
        </x-layouts.section>

        <x-layouts.section>
            <x-slot name="header">
                Shipping
            </x-slot>

            <table class="w-full">
                <thead>
                    <tr>
                        <td> Name </td>
                        <td> Condition </td>
                        <td> Amount </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Shipping </td>
                        <td> Home delivery at Bhola </td>
                        <td> <strong>150 TK</strong> </td>
                    </tr>
                </tbody>
            </table>
        </x-layouts.section>

    </x-layouts.container>
</div>