<div class="bg-white rounded-md shadow-md my-2 w-full">
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    @if (isset($header))
    <div class="px-4 py-2">
        <header>
            @if(isset($title))
            <h2 class="text-lg font-medium text-gray-900">
                {{ $title }}
            </h2>
            @endif
            @if(isset($content))
            <p class="mt-1 text-sm text-gray-600">
                {{ $content }}
            </p>
            @endif

            <div class="flex justify-between items-center">
                {{$header}}
            </div>
        </header>
    </div>
    <hr />
    @endif

    <div class="p-4">
        {{$slot}}
    </div>

    @if (isset($footer))
    <div class="px-4 py-2">
        {{$footer}}
    </div>
    @endif
</div>