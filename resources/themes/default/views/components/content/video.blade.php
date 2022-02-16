@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
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

    <div>
        <div class="w-full aspect-w-16 aspect-h-9">
            <div class="w-full h-full video-container">
                {!! $field->embed_code !!}
            </div>
        </div>
    </div>

    @if($field->caption)
        <x-blocks.caption :caption="$field->caption" />
    @endif
</x-blocks.section>
