<div class="
    flex items-center md:items-stretch
    px-6 md:px-12 pt-2 md:pt-4
    z-20 border-b border-lightest-grey
">
    <div class="
        z-30
        mr-4 md:mr-8 w-12 md:w-16
        pb-2 md:pb-4
    ">
        <a href="/">
            <img
                src="/img/wappen-desaturated.png"
                class="w-12 md:w-16"
            >
        </a>
    </div>

    <div class="
        z-30
        flex flex-col justify-between
        text-white font-display text-sm lg:text-base
        leading-none
    ">
        <div class="
            md:pt-2 pl-px md:px-2 opacity-50 text-lg md:text-2xl
        ">
            <a href="/">Schloss Bödigheim</a>
        </div>
        <ul class="text-left hidden md:block">
            @foreach (nova_cms_menu('main') as $menuItem)
                <li class="
                    inline-block px-2 pb-4 group
                ">
                    @if (@$menuItem->url)
                        <a
                            href="{{ $menuItem->url }}"
                            class="
                                hover:text-main-red
                                @if($menuItem->isCurrent)
                                    opacity-50
                                @endif
                            "
                        >
                            {{ $menuItem->title }}
                        </a>
                    @else
                        <span class="cursor-default">
                            {{ $menuItem->title }}
                        </span>
                    @endif

                    @if(@count($menuItem->children))
                        <ul class="
                            hidden group-hover:block
                            absolute top-full left-0
                            min-w-full
                            bg-dark-grey border-b border-lightest-grey
                            px-2
                        ">
                            @foreach ($menuItem->children as $child)
                                <li>
                                    @if (@$child->url)
                                        <a
                                            href="{{ $child->url }}"
                                            class="
                                                text-sm hover:text-main-red
                                                block pb-3
                                                @if($child->isCurrent)
                                                    opacity-50
                                                @endif
                                            "
                                        >
                                            {{ $child->title }}
                                        </a>
                                    @else
                                        <span class="cursor-default">
                                            {{ $child->title }}
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <div class="z-20 absolute top-6 right-3 block md:hidden">
        <x-parts.mobile-menu />
    </div>
</div>
