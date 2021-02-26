@props([
    'field',
    'index'
])


<x-building-blocks.section maxW="max-w-readable-text">
    <x-building-blocks.headline :tag="$index == 1 ? 'h1' : 'h2'">
    {{ $field->headline }}
    </x-building-blocks.headline>

    <div class="editor mt-4">
        {!! $field->text !!}
    </div>

    @if(@$field->bottom_links)
        <x-building-blocks.bottom-links :bottomLinks="$field->bottom_links" />
    @endif
</x-building-blocks.section>
