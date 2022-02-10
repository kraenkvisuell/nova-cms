@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
])

<x-building-blocks.section>
    <div>
        @if($field->headline)
            <x-building-blocks.headline>
                {!! $field->headline !!}
            </x-building-blocks.headline>
        @endif

        <div>
            {!! $field->text !!}
        </div>

        @if($field->bottom_links)
            <x-building-blocks.links :links="$field->bottom_links" />
        @endif
    </div>
</x-building-blocks.section>
