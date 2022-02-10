@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'links',
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

    @if($field->links)
    <x-building-blocks.links
        :links="$field->links"
    />
    @endif
</x-building-blocks.section>
