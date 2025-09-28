<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
        {{ __('Dashboard') }}
    </x-responsive-nav-link>
    <hr class="my-1" />
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Users</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Role & Permission</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Admin</x-responsive-nav-link>
    <hr class="my-1" />
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Category</x-responsive-nav-link>
    <x-responsive-nav-link href="{{route('system.products.index')}}"
        :active="request()->routeIs('system.products.index')" wire:navigate>
        Products
    </x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('system.products.add')">Add Products
    </x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Order</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Earninga</x-responsive-nav-link>
    <hr class="my-1" />
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Cupon</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Site SEO</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Blogs</x-responsive-nav-link>
    <hr class="my-1" />
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Slider</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Shipping</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')">Settings</x-responsive-nav-link>
</div>