@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'sound',
])

{{--
    Man kann nicht auf eine bestimmte Stelle klicken
 --}}

<x-building-blocks.section>
    @if($field->headline)
        <div class="w-full max-w-container-lg xl:max-w-container-xl">
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
        </div>
    @endif

    <div class="w-full flex flex-col justify-center items-center">
        @if($field->embed_code)
            <div class="w-full sound-container">
                {!! $field->embed_code !!}
            </div>
        @elseif($field->file)
            <x-parts.sound-player
                :file="nova_cms_file($field->file)"
                :title="$field->title"
                :subtitle="@$field->subtitle"
            />
        @endif
    </div>
</x-building-blocks.section>
