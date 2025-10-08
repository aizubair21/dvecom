<div>
    {{-- Do your work, then step back. --}}
    <x-slot name="header">
        Manage Order
    </x-slot>

    <x-layouts.container>
        <x-layouts.section>
            <x-slot name="header">
                <div>
                    <x-secondary-button @click="$dispatch('open-modal', 'order-filter-modal')">
                        filter <i class="fas fa-sort ms-2"></i>
                    </x-secondary-button>
                </div>

                <div>
                    <x-primary-button>
                        <i class="fas fa-plus mr-2"></i> Create
                    </x-primary-button>
                </div>
            </x-slot>


            <x-table>
                {!! $orders->links() !!}
                <thead>

                    <th>
                        <input type="checkbox" class="w-5 h-5 rounded">
                    </th>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>

                </thead>
                <tbody>
                    @foreach ($orders as $item)
                    <tr>
                        <td>
                            <input type="checkbox" wire:model.live='selectedRow' class="w-5 h-5 rounded"
                                value="{{$item->id}}">
                        </td>
                        <td> {{$loop->iteration}} </td>
                        <td> {{$item->id ?? "N\A"}} </td>
                        <td> {{$item->name ?? "N\A"}} </td>
                        <td> {{$item->phone ?? "N\A"}} </td>
                        <td>
                            @if ($item->isAuth())
                            <div class="inline-flex rounded-full px-1 bg-lime-400 text-xs">AUTH</div>
                            @else
                            <div class="inline-flex rounded-full px-1 bg-gray-300 text-white text-xs"> GUEST </div>
                            @endif
                        </td>
                        <td>
                            ৳ {{$item->total ?? "N\A"}}
                        </td>
                        <td>
                            @if ($item->status == 'Pending')
                            <span class="text-xs p-1 border rounded-md bg-yellow-200 text-yellow-900">Pending</span>
                            @elseif ($item->status == 'Accept')
                            <span class="text-xs p-1 border rounded-md bg-green-200 text-green-900">Accept</span>
                            @elseif ($item->status == 'Picked')
                            <span class="text-xs p-1 border rounded-md bg-lime-200 text-lime-900">Picked</span>
                            @elseif ($item->status == 'Delivery')
                            <span class="text-xs p-1 border rounded-md bg-sky-200 text-sky-900">Delivery</span>
                            @elseif ($item->status == 'Delivered')
                            <span class="text-xs p-1 border rounded-md bg-blue-200 text-blue-900">Delivered</span>
                            @elseif ($item->status == 'Confirm')
                            <span class="text-xs p-1 border rounded-md bg-indigo-200 text-indigo-900">Confirm</span>
                            @elseif ($item->status == 'Hold')
                            <span class="text-xs p-1 border rounded-md bg-gray-200 text-gray-900">Hold</span>
                            @elseif ($item->status == 'Cancel')
                            <span class="text-xs p-1 border rounded-md bg-red-200 text-red-900">Cancel</span>
                            @elseif ($item->status == 'Cancelled')
                            <span class="text-xs p-1 border rounded-md bg-red-200 text-red-900">Cancelled</span>
                            @else
                            <span class="text-xs p-1 border rounded-md bg-gray-200 text-gray-900">{{$item-status
                                }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="text-nowarp text-xs">
                                <div>
                                    {{$item->created_at->diffForHumans()}}
                                </div>
                                <div class="text-xs">
                                    {{$item->created_at->toFormattedDateString()}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-1 justify-end">
                                <x-danger-button>
                                    <i class="fas fa-trash"></i>
                                </x-danger-button>
                                <x-secondary-button>
                                    <i class="fas fa-print"></i>
                                </x-secondary-button>
                                <x-nav-link type="btn-primary">
                                    <i class="fas fa-angle-right"></i>
                                </x-nav-link>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </x-table>
        </x-layouts.section>
    </x-layouts.container>


    <x-modal name="order-filter-modal" maxWidth="lg">
        <x-slot name="header">
            Filter Order
        </x-slot>

        <div class="p-4">
            <div class="flex justify-between items-start">
                <div class="">
                    <p class="text-sm mb-1">conditional sorting </p>
                    <div class="p-2 mb-1 border-b hover:bg-gray-200 flex items-center">
                        <input type="radio" name="status" value="Pending" id="Pending" class="w-4 h-4 mr-4" />
                        <p>
                            Pending
                        </p>
                    </div>
                </div>

                <div class="mt-2 w-1/2">

                    <div class=" border rounded-md">
                        <div class=" p-2 ">

                            <div class="flex items-center w-full p-2 text-sm">
                                <input type="radio" style="width:20px; height:20px" class="mr-2"
                                    wire:model.live="created" value="all">All Time
                            </div>
                            <hr />
                            <div class="flex items-center w-full p-2 text-sm">
                                <input type="radio" style="width:20px; height:20px" class="mr-2"
                                    wire:model.live="created" value="day">From First Date
                            </div>
                            <hr />
                            <div class="flex items-center w-full p-2 text-sm">
                                <input type="radio" style="width:20px; height:20px" class="mr-2"
                                    wire:model.live="created" value="between">Between in Range
                            </div>


                        </div>

                        <div class="space-y-2 p-2 ">
                            <div>
                                <x-input-label>
                                    Start Day
                                </x-input-label>
                                <x-text-input wire:model.live='sd' class="rounded-md" type="date" id="" />
                            </div>
                            <div>
                                <x-input-label>Last End</x-input-label>
                                <x-text-input wire:model.live='ed' class="rounded-md" type="date" id="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
</div>