@props([
 'field'
])

@php
    $swiperId = Str::random(12);
@endphp

<div class="
    w-full
    aspect-ratio-16:9
    bg-dark-grey
">
    <div class="absolute top-0 left-0 bottom-0 right-0">
        <div
            id="swiper-{{ $swiperId }}"
            class="
                swiper-container
                absolute w-full h-full
            "
        >
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach(@$field->slides as $slide)
                    <div class="
                        swiper-slide
                        w-full h-full
                    ">
                        <picture class="
                            w-full h-full
                        ">
                            <source media="(min-width: 768px)" srcset="{{ nova_cms_image($slide->image, 'large') }}">

                            <img
                                class="
                                    w-full h-full
                                    object-cover
                                "
                                src="{{ nova_cms_image($slide->image, 'medium') }}"
                                alt="{{ $slide->caption }}"
                            >
                        </picture>

                        @if($slide->caption)
                            <div class="
                                absolute bottom-0 left-0 italic
                                bg-dark-grey text-white text-sm md:text-base
                                px-4 py-1
                            ">
                                {{ $slide->caption }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    (function(){
        var swiperId = 'swiper-{{ $swiperId }}';
        var swiperElement = document.getElementById(swiperId);
        var mySwiper = new Swiper('#'+swiperId, {
            loop: true,
            effect: 'fade',
            autoplay: true,
        });
    })();
</script>
