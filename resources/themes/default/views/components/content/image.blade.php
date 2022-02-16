@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'image',
])

<x-blocks.section>
    @if($field->topline)
        <x-blocks.topline>
            {{ $field->topline }}
        </x-blocks.topline>
    @endif

    @if($field->headline)
        <x-blocks.headline>
            {{ $field->headline }}
        </x-blocks.headline>
    @endif

    @if($field->image)
        <x-blocks.image :src="$field->image" :title="$field->caption" />
    @endif

    @if($field->caption)
        <x-blocks.caption :caption="$caption" />
    @endif
</x-blocks.section>
