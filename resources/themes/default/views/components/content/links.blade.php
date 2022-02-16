@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'links',
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

    @if($field->links)
    <x-blocks.links
        :links="$field->links"
    />
    @endif
</x-blocks.section>
