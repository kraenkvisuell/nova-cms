 @props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
])

@php
    $swiperId = Str::random(12);
@endphp

<x-blocks.section>
    @if($field->topline)
        <x-blocks.topline>
            {{ $field->topline }}
        </x-blocks.topline>
    @endif

    @if($field->headline)
        <x-blocks.headline>
            {{ $field->headline }}
        </x-blocks.headline>
    @endif

    <div>
        <div id="swiper-{{ $swiperId }}" class="
            swiper-container w-full aspect-w-12 aspect-h-9
        ">
            <div class="swiper-wrapper absolute w-full h-full">
                @foreach(@$field->slides as $slide)
                    <div class="swiper-slide">
                        <div class="w-full aspect-w-5 aspect-h-3 bg-gray-800">
                            <img class="absolute object-scale-down"
                                title="{{ $slide->caption }}"
                                src="{{ nova_cms_image($slide->image) }}"
                            />
                        </div>
                        <div class="text-center z-20 pt-5">
                            {{ $slide->caption }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <div class="swiper-pagination absolute bottom-0 items-center w-full"></div>
            </div>

            <div>
                <div class="swiper-button-prev group">
                    <div class="transform rotate-180 cursor-pointer
                        text-primary group-hover:text-secondary
                        absolute bottom-0 left-0
                    ">
                        @include('svgs/arrow')
                    </div>
                </div>

                <div class="swiper-button-next group">
                    <div class="cursor-pointer
                        text-primary group-hover:text-secondary
                        absolute bottom-0 right-0
                    ">
                        @include('svgs/arrow')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blocks.section>

<script>
    (function(){
        var swiperId = 'swiper-{{ $swiperId }}';
        var swiperElement = document.getElementById(swiperId);
        var mySwiper = new Swiper('#'+swiperId, {
            loop: false,
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    })();
</script>
