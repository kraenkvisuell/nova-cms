@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
])


<x-building-blocks.section>
    <blockquote>
        @if($field->quote)
            <div>
                {!! $field->quote !!}
            </div>
        @endif

        @if($field->author)
            <div>
                — {!! $field->author !!}
            </div>
        @endif

    </blockquote>
</x-building-blocks.section>
