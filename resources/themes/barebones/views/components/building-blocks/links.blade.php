@props([
    'links' => [],
])

<div>
    @foreach($links as $link)
        <a 
            href="$link->link_url"
            class="block"
        >
            {{ $link->link_text }}
        </a>
    @endforeach
</div>
