@props([
    'harmonicaId' => ''
])

<div
    x-data
    x-cloak
    x-show="$store.harmonica.openItem == '{{ $harmonicaId }}'"
>
    {{ $slot }}
</div>
