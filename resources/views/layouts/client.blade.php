@extends('layouts.master')

@section('content')
<flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">

    {{--
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" /> --}}
    {{--
    <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc."
        class="max-lg:hidden dark:hidden" /> --}}
    <flux:brand wire:navigate href="/" logo="{{asset('deshoj-vandar.jpg')}}" name="" class=" dark:flex" />
    <flux:navbar class="-mb-px ">
        <flux:dropdown>
            <flux:navbar.item icon:trailing="chevron-down">Categories</flux:navbar.item>
            <flux:navmenu>
                <flux:navmenu.item href="#">Marketing site</flux:navmenu.item>
                <flux:navmenu.item href="#">Android app</flux:navmenu.item>
                <flux:navmenu.item href="#">Brand guidelines</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
    </flux:navbar>
    <flux:spacer />
    <flux:navbar class="me-4">

        <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />

        {{--
        <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings" /> --}}
        <div class="relative flex items-center space-x-2">
            <flux:navbar.item icon="shopping-cart" href="#" label="Help" />
            <flux:badge class="absolute top-0 right-0 size-4 bg-white">10</flux:badge>

        </div>
    </flux:navbar>
    <flux:dropdown position="top" align="start" class="hidden lg:block">
        <flux:profile />
        <flux:menu>
            <x-responsive-nav-link>Profile</x-responsive-nav-link>
            <flux:menu.separator />
            @auth
            <flux:menu.item wire:navigate href="{{route('logout')}}" icon="arrow-right-start-on-rectangle">Logout
            </flux:menu.item>
            @else
            <flux:menu.item wire:navigate href="{{route('login')}}" icon="arrow-right-start-on-rectangle">Login
            </flux:menu.item>
            @endauth
        </flux:menu>
    </flux:dropdown>
</flux:header>


<div class="">
    {{ $slot ?? '' }}
    {{-- if $slot is not set then show yield viewport --}}
    @yield('viewport')
</div>
{{-- footer --}}
<div class="bg-white border-t border-gray-200">
    <x-container>
        <div class="md:flex items-start justify-between">
            <div class="py-8 text-center md:text-left">
                <h2 class="text-2xl font-bold mb-4">About Us</h2>
                <p class="text-gray-600 mb-4">Deshoj Vandar is your go-to destination for quality
                    products and exceptional service.
                </p>
                <p class="text-gray-600 mb-4">We are committed to providing the best shopping
                    experience with a wide range of products at competitive prices.
                </p>
                <hr class="my-4">
                <x-nav-link type="link" href="#" class="hover:text-gray-900">
                    Privacy Policy
                </x-nav-link>
                <x-nav-link type="link" href="#" class="hover:text-gray-900">
                    Terms of Service
                </x-nav-link>
                <x-nav-link type="link" href="#" class="hover:text-gray-900">
                    Contact Us
                </x-nav-link>
                <x-nav-link type="link" href="#" class="hover:text-gray-900">
                    FAQs
                </x-nav-link>
                <hr class="my-4">

                <x-nav-link type="btn-primary" href="">
                    Learn More
                </x-nav-link>

            </div>

            <div class="py-8 text-center">
                <h2 class="text-2xl font-bold mb-4">Stay Connected</h2>
                <p class="text-gray-600 mb-4">Follow us on social media for the latest updates.</p>
                <div class="flex justify-center space-x-4 rtl:space-x-reverse">
                    <x-nav-link type="link" href="#" class="text-blue-600 hover:text-blue-800">
                        Facebook
                    </x-nav-link>
                    <x-nav-link type="link" href="#" class="text-blue-400 hover:text-blue-600">
                        Twitter
                    </x-nav-link>
                    <x-nav-link type="link" href="#" class="text-pink-600 hover:text-pink-800">
                        Instagram
                    </x-nav-link>
                </div>
            </div>
        </div>
    </x-container>
    <x-container>
        <div class="py-8 text-center">
            <p class="text-gray-600">© {{now()->year}} Deshoj Vandar. All rights reserved.</p>
        </div>
    </x-container>
</div>
@endsection