@props([
    'field',
    'layout' => '',
])

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
