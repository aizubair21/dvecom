@props(['type' => 'link', 'active' => false])

@php
if ($type == 'link') {
$classes = ($active ?? false)
? 'w-auto inline-flex items-center px-4 py-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5
text-gray-900
focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
: 'w-auto inline-flex items-center px-4 py-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5
text-gray-500
hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition
duration-150 ease-in-out';
}

if ($type == 'btn-primary') {
$classes = 'w-auto inline-flex items-center px-4 py-2 shadow text-sm font-medium leading-5 bg-lime-500 rounded-md
hover:bg-lime-700 text-white hover:shadow-sm transition duration-150 ease-in-out';
}

if ($type == 'btn-danger') {
$classes = 'w-auto inline-flex items-center px-4 py-2 shadow text-sm font-medium leading-5 bg-red-700
hover:bg-red-900
text-white rounded-md hover:shadow-sm transition duration-150 ease-in-out';
}

if ($type == 'btn-secondary') {
$classes = 'w-auto inline-flex items-center border border-1 shadow hover:border-gray-500 text-sm text-gray-600
px-4 py-2
rounded-md hover:text-gray-900 hover:bg-gray-100';
}
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    {{ $slot }}
</a>





{{-- @props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900
focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500
hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition
duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a> --}}