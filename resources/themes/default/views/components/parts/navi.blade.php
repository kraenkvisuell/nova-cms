@props([
    'page' => '',
])

{{--
    Abfrage > Ist Menüpunkt ein externer Link?
--}}

<div id="navi" class="
    fixed top-0 left-0 w-full bg-gray-800 z-40
    flex flex-row h-12 xl:h-16 items-center px-4 xl:px-6 font-title font-semibold
">
    <a href="/" title="{{ nova_cms_setting('website_title') }}" class="
        flex hover:text-secondary text-white z-50
    ">
        {{ nova_cms_setting('website_title') }}
    </a>

    <div class="flex flex-row justify-end w-full hidden md:flex">
        @foreach (nova_cms_menu('main') as $menuItem)
            <a href="{{ $menuItem->url }}" class="
                ml-6 hover:text-secondary text-white
                @if($menuItem->isCurrent)
                    text-primary
                @endif
            ">
                {{ $menuItem->title }}
            </a>
        @endforeach
    </div>

    <div class="flex md:hidden w-full flex-row justify-end">
        <x-parts.navi.mobile :page="$page">
        </x-parts.navi.mobile>
    </div>
</div>
