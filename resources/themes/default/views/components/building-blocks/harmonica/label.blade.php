@props([
    'harmonicaId' => '',
])

<x-building-blocks.element>
    <div
        x-data
        @click="$store.harmonica.toggleItem('{{ $harmonicaId }}')"
        class="
            w-full cursor-pointer font-title font-semibold
            flex flex-row hover:text-secondary -mb-2
        "
        :class="{
            'text-gray-400': $store.harmonica.openItem == '{{ $harmonicaId }}',
            'text-primary': $store.harmonica.openItem != '{{ $harmonicaId }}'
        }"
    >
        <div
            class="flex h-5 2xl:h-5 mt-1 mr-3 transform"
            :class="{
                'rotate-180': $store.harmonica.openItem == '{{ $harmonicaId }}',
                '': $store.harmonica.openItem != '{{ $harmonicaId }}'
            }"
        >
            @include('svgs/arrow-small')
        </div>

        <p>
            {{ $slot }}
        </p>
    </div>
</x-building-blocks.element>
