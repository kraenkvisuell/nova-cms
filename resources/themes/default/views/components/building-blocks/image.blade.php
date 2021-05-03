@props([
    'field',
    'src',
    'title' => '',
])

<x-building-blocks.element>
    {{--
        @if(@$field->orientation == 'landscape')
        @elseif(@$field->orientation == 'portrait')
        @elseif(@$field->orientation == 'square')
        @endif
    --}}
    <div class="w-full flex justify-start">
        <img
            title="{{ $title }}"
            class="max-w-full max-h-image-max"
            src="{{ nova_cms_image($src) }}"
        />
    </div>
</x-building-blocks.element>
