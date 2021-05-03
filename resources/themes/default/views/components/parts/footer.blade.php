@props([
    'layout' => 'footer',
])

<div class="w-full bg-gray-800 text-white py-12 mt-6 tracking-wide">
    <x-building-blocks.section>
        <x-building-blocks.text :layout="$layout">
            {!! nova_cms_setting('address') !!}
        </x-building-blocks.text>

        <x-building-blocks.text :layout="$layout">
            <strong class="pr-1">{{ __('Telefon:') }}</strong>
            {{ nova_cms_setting('phone') }}
        </x-building-blocks.text>

        <x-building-blocks.text :layout="$layout">
            <strong class="pr-1">{{ __('E-Mail:') }}</strong>
            {{ nova_cms_setting('email') }}
        </x-building-blocks.text>

        <div class="w-full h-8"></div>

        @foreach(nova_cms_setting('social_links') ?: [] as $socialLink)
            <x-building-blocks.element>
                <a class="hover:text-secondary flex flex-row"
                    href="{{ $socialLink->link_url }}"
                    title="{{ $socialLink->link_title }}"
                >
                    <div class="w-6 h-6 flex justify-center items-center">
                        {!! $socialLink->svg_tag !!}
                    </div>
                    <p class="pl-2 -mt-0.5">{{ $socialLink->link_title }}</p>
                </a>
            </x-building-blocks.element>
        @endforeach

        <div class="w-full h-8"></div>

        <x-building-blocks.element>
            <x-building-blocks.text :layout="$layout">
                <strong>Seitennavigation</strong>
            </x-building-blocks.text>

            @foreach (nova_cms_menu('footer') as $menuItem)
                <a href="{{ $menuItem->url }}" class="
                    hover:text-secondary flex
                ">
                    {{ $menuItem->title }}
                </a>
            @endforeach
        </x-building-blocks.element>
    </x-building-blocks.section>
</div>
