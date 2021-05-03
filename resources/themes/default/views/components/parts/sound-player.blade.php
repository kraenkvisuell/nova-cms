@props([
    'file',
    'title',
    'subtitle',
])

@php $ref = Str::random(12); @endphp

<x-building-blocks.element>
    <div
        class="w-full"
        x-data="soundPlayer('{{ $ref }}')"
        x-init="initialize()"
        id="{{ $ref }}"
    >
        <audio x-ref="{{ $ref }}" preload="metadata">
            <source src="{{ $file }}" type="audio/mpeg" />
        </audio>

        <div class="flex flex-row">
            <div class="min-w-12 w-12 h-12 mt-1 hover:bg-secondary
                bg-primary rounded-full flex justify-center items-center
            ">
                <div class="flex w-8 h-8 text-white">
                    <button @click="play()" x-show="!playing">
                        @include('svgs/play')
                    </button>

                    <button @click="pause()" x-show="playing">
                        @include('svgs/pause')
                    </button>
                </div>
            </div>

            <div class="ml-4 md:ml-8 w-full">
                <div class="font-serif flex justify-between leading-snug">
                    <p>
                        <span class="font-title font-bold text-primary pr-1">{{ $title }}</span>
                        {{ $subtitle }}
                    </p>
                    <p class="ml-4 flex flex-col sm:flex-row justify-end">
                        <span class="flex justify-end" x-text="position"></span>
                        <span class="flex justify-end flex-row"> /
                            <span class="ml-1" x-text="duration"></span>
                        </span>
                    </p>
                </div>
                <div class="js-seekbar h-2 w-full bg-gray-400 my-3"
                    @click="seek(event.clientX)"
                >
                    <div class="h-2 bg-primary border-r-2 border-white"
                        :style="`width: ${percent}%`"
                    >
                    </div>
                </div>
                <div class="flex justify-end">
                    <div class="flex h-4 mr-2">
                        @include('svgs/sound')
                    </div>
                    <div class="js-volume h-2 w-32 bg-gray-400 mt-1"
                        @click="setVolume(event.clientX)"
                    >
                        <div class="h-2 bg-primary border-r-2 border-white"
                            :style="`width: ${volume}%`"
                        >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-building-blocks.element>
