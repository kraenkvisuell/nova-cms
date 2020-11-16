@props([
    'contentBlock'
])

<x-dynamic-component
    :component="'theme.content-blocks.'.$contentBlock->block"
    :field="$contentBlock->attributes"
/>
