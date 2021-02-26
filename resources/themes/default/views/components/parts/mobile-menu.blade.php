<div x-data="mobileMenu()">
    <div
        class="z-20 top-2 cursor-pointer px-5 py-4"
        @click="toggle"
    >
        <div
            class="
                absolute right-4 top-0
                h-2px w-5
                bg-white opacity-50
                transform duration-500 ease-in-out transition-all
            "

            :class="{
                'top-0 rotate-0': !show,
                'top-2 -rotate-45': show,
            }"
        >
        </div>

        <div
            class="
                absolute right-4 top-2
                h-2px w-5
                bg-white opacity-50
                transform duration-500 ease-in-out transition-all
            "

            :class="{
                'opacity-50': !show,
                'opacity-0': show,
            }"
        >
        </div>

        <div
            class="
                absolute right-4 top-4
                h-2px w-5
                bg-white opacity-50
                transform duration-500 ease-in-out transition-all
            "

            :class="{
                'top-4 rotate-0': !show,
                'top-2 rotate-45': show,
            }"
        >
        </div>

    </div>

    <div
        x-cloak
        x-show="isOpen()"
        class="
            z-10
            fixed top-0 left-0 w-full h-full
            bg-darkest-grey
        "
    >
        <div class="
            absolute top-20 w-full pl-8 h-mobile-scroll
        ">
            <div
                class="h-full w-full overflow-scroll scrolling-touch pt-8 pb-20"
                id="mobileMenuScroll"
            >
                @foreach (nova_cms_menu('main') as $menuItem)
                    <a
                        href="{{ $menuItem->url }}"
                        class="
                            font-display
                            block text-lg pb-2
                            @if($menuItem->isCurrent)
                                text-white
                            @else
                                text-white
                            @endif
                        "
                    >
                        {{ $menuItem->title }}
                    </a>
                    @foreach ($menuItem->children as $child)
                            @if (@$child->url)
                                <a
                                    href="{{ $child->url }}"
                                    class="
                                        font-display
                                        text-white
                                        text-sm
                                        block pb-2 pl-6
                                        @if($loop->last)
                                            mb-2
                                        @endif
                                    "
                                >
                                    {{ $child->title }}
                                </a>
                            @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    function mobileMenu() {
        return {
            show: false,
            toggle() {
                this.show = !this.show;

                var targetElement = document.querySelector('#mobileMenuScroll');
                if (this.show) {
                    bodyScrollLock.disableBodyScroll(targetElement);
                } else {
                    bodyScrollLock.enableBodyScroll(targetElement);
                }
            },
            isOpen() { return this.show === true },
        }
    }
</script>
