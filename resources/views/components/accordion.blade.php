<div class="w-full" x-data="{show:false}">
    <h2 id="" @click="show = !show">
        <button type="button"
            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 hover:bg-gray-200 gap-3"
            :class="show && 'bg-gray-100'">
            <span>
                {{$title}}
            </span>
            {{-- if show, rotate 180 deg --}}
            <svg class="w-3 h-3 shrink-0" :class="show || 'rotate-180'" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </h2>
    <div x-show="show" transition duration-150 ease-in-out>
        <div class="p-5 border border-b-0 border-gray-200">
            {{$content}}
        </div>
    </div>
</div>