@extends('layouts.master')
<div class="min-h-screen bg-gray-100">
    <livewire:layout.navigation />

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif


    <div class="flex items-start w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- sidebar --}}
        <div class="hidden w-[250px] md:block mt-6">
            <div class="h-screen">
                <livewire:layout.sidebar />
            </div>
        </div>

        <!-- Page Content -->
        <main class="w-full">
            {{ $slot }}
        </main>
    </div>
</div>