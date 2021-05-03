@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'text-images',
])

{{--
    Fehlende Felder
        > Image
            > caption
            > subcaption
            > credits
            > Download Datei ??? > doppelt sich mit Links
 --}}

@php $harmonicaId = Str::random(20); @endphp

<x-building-blocks.section>
    <div class="md:flex flex-row
        @if($field->images_position == "left")
            flex-row-reverse
        @endif
    ">
        <div class="md:w-1/2
            @if($field->images_position == "right")
                md:pr-12
            @endif
            @if($field->images_position == "left")
                md:pl-12
            @endif
        ">
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

            @if($field->text)
                <x-building-blocks.text :layout="$layout">
                    {!! $field->text !!}
                </x-building-blocks.text>
            @endif

            @if($field->bottom_links)
                @foreach($field->bottom_links as $bottomLink)
                    <x-building-blocks.links
                        :url="$bottomLink->link_url"
                        :text="$bottomLink->link_text"
                        :layout="$layout"
                        :link="$bottomLink"
                    />
                @endforeach
            @endif
        </div>

        <div class="md:w-1/2">
            @if($field->images)
                @foreach($field->images as $image)
                    <x-building-blocks.image
                        :field="$field"
                        :layout="$layout"
                        :src="$image->image"
                    />
                @endforeach
            @endif
        </div>
    </div>
</x-building-blocks.section>
