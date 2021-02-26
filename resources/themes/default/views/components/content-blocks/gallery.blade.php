@props([
    'field'
])

@php
    $swiperId = Str::random(12);
@endphp

<x-building-blocks.section>
    <x-building-blocks.headline>
        {{ $field->headline }}
    </x-building-blocks.headline>

    <div class="
        w-full -top-6
    ">
        <div
            id="swiper-{{ $swiperId }}"
            class="
                swiper-container
                w-full
            "
        >
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper h-full">
                <!-- Slides -->
                @foreach(@$field->slides as $slide)
                    <div class="
                        swiper-slide
                        h-full m-auto
                        flex flex-col items-center justify-center
                    ">
                        <div class="text-sm italic mt-4">
                            &nbsp;
                        </div>

                        <picture class="
                            max-w-full md:max-w-3/4 max-h-80 md:max-h-128
                        ">
                            <source media="(min-width: 768px)" srcset="{{ nova_cms_image($slide->image, 'large') }}">

                            <img
                                class="
                                max-w-full max-h-80 md:max-h-128
                                    md:shadow
                                "
                                src="{{ nova_cms_image($slide->image, 'medium') }}"
                                alt="{{ $slide->caption }}"
                            >
                        </picture>

                        <div class="
                            text-xs md:text-sm italic
                            text-center leading-none md:leading-tight
                            mt-1 md:mt-4
                        ">
                            @if(count($field->slides) > 1)
                            <strong>{{ $loop->index + 1 }}/{{ count($field->slides) }}</strong>
                            @endif
                            &nbsp;{!! nl2br($slide->caption) !!}&nbsp;
                        </div>
                    </div>
                @endforeach
            </div>

            @if(count(@$field->slides) > 1)
                <div class="
                    swiper-button-prev group
                    text-grey text-3xl lg:text-4xl
                    opacity-0 sm:opacity-100
                    -left-1 sm:left-4 md:left-12
                    cursor-pointer
                    font-display
                ">
                    &lt;
                </div>

                <div class="
                    swiper-button-next group
                    text-grey text-3xl lg:text-4xl
                    opacity-0 sm:opacity-100
                    -right-1 sm:right-4 md:right-12
                    cursor-pointer
                    font-display
                ">
                    &gt;
                </div>
            @endif
        </div>
    </div>
</x-building-blocks.section>

<script>
    (function(){
        var swiperId = 'swiper-{{ $swiperId }}';
        var swiperElement = document.getElementById(swiperId);
        var mySwiper = new Swiper('#'+swiperId, {
            // Optional parameters
            loop: {{ @count(@$field->slides) > 1 ? 'true' : 'false' }},
            spaceBetween: 20,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    })();
</script>
