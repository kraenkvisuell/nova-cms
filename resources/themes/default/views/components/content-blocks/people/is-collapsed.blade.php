@props([
    'field',
    'harmonicaId',
    'layout' => '',
])

<x-building-blocks.harmonica.label :harmonicaId="$harmonicaId">
    {{ $field->topline }}
</x-building-blocks.harmonica.label>

<x-building-blocks.harmonica.content :harmonicaId="$harmonicaId">
    @if($field->headline)
        <x-building-blocks.headline :layout="$layout">
            {!! $field->headline !!}
        </x-building-blocks.headline>
    @endif

    @if($field->text)
        <x-building-blocks.text :layout="$layout">
            {!! $field->text !!}
        </x-building-blocks.text>
    @endif

    @foreach($field->people as $person)
        <x-building-blocks.person :person="$person" :layout="$layout" />
    @endforeach

    {{-- @if($field->bottom_links)
        @foreach($field->bottom_links as $bottomLink)
            <x-building-blocks.links
                :url="$bottomLink->link_url"
                :text="$bottomLink->link_text"
                :block="$block"
                :field="$field"
                :link="$bottomLink"
            />
         @endforeach
    @endif --}}
</x-building-blocks.harmonica.content>
