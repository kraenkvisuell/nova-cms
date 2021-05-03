@props([
    'page' => '',
])

<div x-data="mobileMenu()">
    <div
        class="z-50 cursor-pointer w-10 h-10 -mr-2 mt-2"
        @click="toggle"
    >
        <div class="absolute right-2 top-3 h-px w-5 bg-primary
            transform duration-500 ease-in-out transition-all"
            :class="{
                'top-3 rotate-0': !show,
                'top-4 -rotate-45': show,
            }"
        ></div>

        <div class="absolute right-2 top-4 h-px w-5 bg-primary
                transform duration-500 ease-in-out transition-all"
            :class="{
                'opacity-100': !show,
                'opacity-0': show,
            }"
        ></div>

        <div class="absolute right-2 top-5 h-px w-5 bg-primary
                transform duration-500 ease-in-out transition-all"
            :class="{
                'top-5 rotate-0': !show,
                'top-4 rotate-45': show,
            }"
        ></div>
    </div>

    <div x-cloak x-show="isOpen()"
        class="z-40 fixed top-0 left-0 w-full h-full bg-gray-800"
    >
        <div class="absolute top-12 w-full pl-5 h-mobile-scroll">
            <div id="mobileMenuScroll" class="
                h-full w-full overflow-scroll scrolling-touch
                pt-12 px-4 text-3xl
            ">
                @foreach (nova_cms_menu('main') as $menuItem)
                    <a href="{{ $menuItem->url }}" class="
                        ml-6 hover:text-secondary text-white flex
                        @if($menuItem->isCurrent)
                            text-primary
                        @endif
                    ">
                        {{ $menuItem->title }}
                    </a>
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
