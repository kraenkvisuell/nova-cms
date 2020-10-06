@php
//dd(nova_get_menu_by_slug('main'));
@endphp

<div class="
    flex items-center
    px-12 py-4 bg-dark-grey
    border-t
    z-20 shadow
">
    <div class="
        mr-8
    ">
        <a href="/">
            <img
                src="/img/wappen-desaturated.png"
                class="w-20"
            >
        </a>
    </div>

    <ul>
        @foreach (nova_get_menu_by_slug('main')['menuItems'] as $menuItem)
            <li class="
                inline-block px-2
            ">
                <a
                    href="{{ $menuItem['value']->url() }}"
                    class="text-white font-display text-2xl"
                >
                    {{ $menuItem['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
