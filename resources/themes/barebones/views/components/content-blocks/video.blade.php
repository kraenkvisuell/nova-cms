@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
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

    <div>
        <div class="w-full aspect-w-16 aspect-h-9">
            <div class="w-full h-full video-container">
                {!! $field->embed_code !!}
            </div>
        </div>
    </div>

    @if($field->caption)
        <x-building-blocks.caption :caption="$field->caption" />
    @endif
</x-building-blocks.section>
