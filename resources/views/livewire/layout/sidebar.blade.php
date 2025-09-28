<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
        <i class="far fa-home pr-2"></i> {{ __('Dashboard') }}
    </x-responsive-nav-link>
    <hr class="my-1" />
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="far fa-user pr-2"></i> Users
    </x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="fas fa-shield pr-2"></i> Role
    </x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="fas fa-user-shield pr-2"></i>
        Admin</x-responsive-nav-link>
    <hr class="my-1" />
    <x-responsive-nav-link href="{{route('system.category.index')}}"
        :active="request()->routeIs('system.category.index')"> <i class="far fa-folder pr-2"></i>
        Category</x-responsive-nav-link>
    <x-responsive-nav-link href="{{route('system.products.index')}}"
        :active="request()->routeIs('system.products.index')">
        <i class="fas fa-layer-group pr-2"></i> Products
    </x-responsive-nav-link>
    <x-responsive-nav-link href="{{route('system.products.create')}}"
        :active="request()->routeIs('system.products.create')">
        <i class="fas fa-plus pr-2"></i> Add Products
    </x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="fas fa-cart-plus pr-2"></i>
        Order</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="fas fa-dollar-sign pr-2"></i>
        Earning </x-responsive-nav-link>
    <hr class="my-1" />
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="fas fa-gift pr-2"></i> Cupon
    </x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="far fa-file-alt pr-2"></i> Site
        SEO</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="far fa-newspaper pr-2"></i>
        Blogs</x-responsive-nav-link>
    <hr class="my-1" />
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="far fa-image pr-2"></i> Slider
    </x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="fas fa-truck-fast pr-2"></i>
        Shipping</x-responsive-nav-link>
    <x-responsive-nav-link href="" :active="request()->routeIs('dashboard')"> <i class="fas fa-cog pr-2"></i>
        Settings</x-responsive-nav-link>
</div>