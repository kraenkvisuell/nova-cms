@props([
    'field',
])

<x-building-blocks.element>
    <h5 class="text-primary font-title font-bold">
        {!! nl2br($field->caption) !!}
    </h5>

    <p>
        {!! nl2br($field->subcaption) !!}
    </p>

    @if($field->credits)
        <p class="text-gray-400 font-title text-xs xl:text-sm mt-1">
            {!! nl2br($field->credits) !!}
        </p>
    @endif
</x-building-blocks.element>
