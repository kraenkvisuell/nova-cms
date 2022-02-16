@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
])

<x-blocks.section>
    <div>
        @if($field->headline)
            <x-blocks.headline>
                {!! $field->headline !!}
            </x-blocks.headline>
        @endif

        <div>
            {!! $field->text !!}
        </div>

        @if($field->bottom_links)
            <x-blocks.links :links="$field->bottom_links" />
        @endif
    </div>
</x-blocks.section>
