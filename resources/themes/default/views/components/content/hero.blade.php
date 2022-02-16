@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
])

<div class="
    mb-12 w-full min-h-hero-lg xl:min-h-hero-xl bg-gray-800
    justify-center items-center flex flex-col tracking-wide py-12
">
    @if($field->slides)
        <x-content.hero.slides :slides="$field->slides"/>
    @endif
</div>
