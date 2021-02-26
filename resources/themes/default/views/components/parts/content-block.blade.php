@props([
    'contentBlock',
    'index'
])

<x-dynamic-component
    :component="'content-blocks.'.$contentBlock->block"
    :field="$contentBlock->field"
    :index="$index"
/>
