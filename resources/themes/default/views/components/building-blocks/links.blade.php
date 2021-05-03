@props([
    'link' => '',
    'url' => '',
    'text' => '',
    'layout' => '',
])

<x-building-blocks.element>
    <a href="{{ $url }}"
        class="
            p-2 cursor-pointer font-bold flex flex-row justify-center
            font-title text-center text-primary hover:text-secondary
            border-2 border-primary hover:border-secondary
        "
        @if($layout !== "hero")
            @if(nova_cms_link_is_file($link))
                target="_blank" download
            @elseif(nova_cms_link_is_external($link))
                target="_blank"
            @endif
        @endif
    >
        @if($layout !== "hero")
            <div class="h-5 pr-1 mt-0.5 flex">
                @if(nova_cms_link_is_file($link))
                    @include('svgs/download')
                @else
                    @include('svgs/arrow')
                @endif
            </div>
        @endif

        <p>{{ $text }}</p>
    </a>
</x-building-blocks.element>
