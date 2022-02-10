@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'image',
])

<x-building-blocks.section>
    @if($field->topline)
        <x-building-blocks.topline>
            {{ $field->topline }}
        </x-building-blocks.topline>
    @endif

    @if($field->headline)
        <x-building-blocks.headline>
            {{ $field->headline }}
        </x-building-blocks.headline>
    @endif

    @if($field->image)
        <x-building-blocks.image :src="$field->image" :title="$field->caption" />
    @endif

    @if($field->caption)
        <x-building-blocks.caption :caption="$caption" />
    @endif
</x-building-blocks.section>
