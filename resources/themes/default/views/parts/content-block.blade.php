@props([
    'contentBlock'
])

<x-dynamic-component
    :component="'content-blocks.'.$contentBlock->block"
    :field="$contentBlock->field"
/>
