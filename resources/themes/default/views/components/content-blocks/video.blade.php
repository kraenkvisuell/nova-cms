@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'video',
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

    <x-building-blocks.element>
        <div class="w-full aspect-w-16 aspect-h-9">
            <div class="w-full h-full video-container">
                {!! $field->embed_code !!}
            </div>
        </div>
    </x-building-blocks.element>

    @if($field->caption || $field->subcaption)
        <x-building-blocks.caption :field="$field" :layout="$layout" />
    @endif
</x-building-blocks.section>
