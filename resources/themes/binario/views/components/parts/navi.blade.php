<div class="
    fixed top-0 left-0 z-50 w-full
">
    <nav class="
        flex justify-between flex-wrap lg:pl-4 pl-3 lg:pr-0 md:pr-1 pr-3 pt-2
        w-full h-12 border-solid border-b border-gray-400 bg-gray-200
    ">
        <a href="/" class="flex flex-shrink-0 text-white mr-6 pt-2">
            @include('svgs/logo')
        </a>
        <div class="block md:hidden pt-2">
            @include('svgs/menu')
        </div>
        <div class="md:block hidden flex-row-reverse flex items-center w-auto font-light pt-1">
            <div class="text-sm lg:flex-grow text-gray-800">
                @foreach (nova_cms_menu('main') as $menuItem)
                    <x-navigation-link :menuItem="$menuItem" />
                @endforeach
            </div>
        </div>
    </nav>
    <div class="absolute left-0 top-full border-solid border-b border-gray-400 w-full h-0.5 z-50 bg-gray-200"></div>
</div>
