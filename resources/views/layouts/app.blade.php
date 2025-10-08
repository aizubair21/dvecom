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


    <div class="md:flex items-start w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- sidebar --}}
        <div class="hidden w-[180px] md:block mt-6">
            <div class="h-screen">
                <livewire:layout.sidebar />
            </div>
        </div>

        <!-- Page Content -->
        <main class="flex-1 overflow-hidden overflow-x-scroll">
            {{ $slot }}
        </main>
    </div>

    @push('style')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    @endpush


    @push('script')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>


    @endpush
</div>