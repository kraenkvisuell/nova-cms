@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'people',
])

{{--
    Fehlende Felder
        > Image
            > credits
        > Bottom Link
 --}}

@php $harmonicaId = Str::random(20); @endphp

<x-building-blocks.section>
    @if($field->is_collapsed)
        <x-content-blocks.people.is-collapsed
            :field="$field"
            :layout="$layout"
            :harmonicaId="$harmonicaId"
        />
    @else
        <x-content-blocks.people.not-collapsed
            :field="$field"
            :layout="$layout"
        />
    @endif
</x-building-blocks.section>
