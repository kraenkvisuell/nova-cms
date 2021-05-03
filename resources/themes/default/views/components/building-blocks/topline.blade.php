@props([
    'layout' => '',
])

<x-building-blocks.element>
    <h5 class="
            font-title font-bold
            @if($layout == 'hero')
                text-primary text-center
            @else
                text-gray-400
            @endif
            @if($layout == 'quote')
                mb-0
            @else
                -mb-4
            @endif
    ">
        {{ $slot }}
    </h5>
</x-building-blocks.element>
