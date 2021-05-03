@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'image',
])

<x-building-blocks.section>
    @if($field->topline)
        <x-building-blocks.topline :layout="$layout">
            {{ $field->topline }}
        </x-building-blocks.topline>
    @endif

    @if($field->headline)
        <x-building-blocks.headline :layout="$layout">
            {{ $field->headline }}
        </x-building-blocks.headline>
    @endif

    @if($field->image)
        <x-building-blocks.image :src="$field->image" :layout="$layout" :title="$field->caption" />
    @endif

    @if($field->caption || $field->subcaption || $field->credits)
        <x-building-blocks.caption :field="$field" :layout="$layout" />
    @endif
</x-building-blocks.section>
