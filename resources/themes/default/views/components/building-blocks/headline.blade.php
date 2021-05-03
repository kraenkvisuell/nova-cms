@props([
    'layout' => '',
    'buildingBlock' => '',
])

<x-building-blocks.element>
    <h1 class="
        font-bold font-title 
        @if($layout == 'hero')
            text-6xl xl:text-7xl text-white text-center
        @else
            text-4xl xl:text-5xl text-secondary
        @endif

        @if($buildingBlock == 'person' || $buildingBlock == 'quote')
            -mb-3
        @endif
    ">
        {{ $slot }}
    </h1>
</x-building-blocks.element>
