@props([
    'layout' => '',
])

<x-building-blocks.element>
    <div class="editor
        @if($layout == 'hero')
            text-white text-center
        @elseif($layout == 'footer')
            text-white
        @else
            text-gray-800
        @endif
    ">
        {{ $slot }}
    </div>
</x-building-blocks.element>
