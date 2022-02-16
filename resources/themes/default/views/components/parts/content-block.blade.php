@props([
    'contentBlock',
    'nextBlock' => null,
    'prevBlock' => null,
    'loop',
    'context' => 'page',
    'mode' => 'current',
])

@if(!@$contentBlock->field->attributes->hide)
    <x-dynamic-component
        :component="'content.'.$contentBlock->block"
        :field="$contentBlock->field"
        :nextBlock="$nextBlock"
        :prevBlock="$prevBlock"
        :loop="$loop"
        :context="$context"
        :mode="$mode"
        :layout="$contentBlock->field->layout"
    />
    <div class="w-full h-16 xl:h-24"></div>
@endif
