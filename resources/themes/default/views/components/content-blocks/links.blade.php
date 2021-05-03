@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'links',
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

    @if($field->links)
        @foreach($field->links as $link)
            <x-building-blocks.links
                :url="$link->link_url"
                :text="$link->link_text"
                :layout="$layout"
                :field="$field"
                :link="$link"
            />
        @endforeach
    @endif
</x-building-blocks.section>
