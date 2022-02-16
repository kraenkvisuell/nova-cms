@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
])


<x-blocks.section>
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
</x-blocks.section>
