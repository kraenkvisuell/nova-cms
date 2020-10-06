@props([
    'banners'
])

<div class="
    w-full aspect-ratio-3/1 relative
    bg-dark-grey
">
    <div class="absolute top-0 left-0 bottom-0 right-0">
        @foreach($banners as $banner)
            <div class="absolute top-0 left-0 bottom-0 right-0">
                <img
                    src="{{ $banner['url'] }}"
                    alt="{{ $banner['alt_text'] }}"
                    class="
                        absolute top-0 left-0
                        w-full h-full object-cover
                        @if($loop->first)
                            opacity-1
                        @else
                            opacity-0
                        @endif
                    "
                >
            </div>
        @endforeach
    </div>
</div>
