@props([
    'contentBlock',
    'nextBlock' => null,
    'prevBlock' => null,
    'loop',
    'context' => 'page',
    'mode' => 'current',
])

{{--
    - Feld: Hintergrundfarbe (Auswahl aus "weiß, schwarz, grau")
    - Feld: Abstand vor vorherigem Block (Boolean, default = true)
    ( - Content-Blocks einem Bereich zufügen (hier beginnt / hier endet Bereich) )
--}}

@if(!@$contentBlock->field->attributes->hide)
    <x-dynamic-component
        :component="'content-blocks.'.$contentBlock->block"
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
