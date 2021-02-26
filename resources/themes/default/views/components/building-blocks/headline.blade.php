@props([
    'tag' => 'h2',
])

<{{ $tag }}
    {{
        $attributes->merge([
            'class' => 'text-center text-2xl md:text-4xl font-display text-grey'
        ])
    }}
>
    {{ $slot }}
</{{ $tag }}>
