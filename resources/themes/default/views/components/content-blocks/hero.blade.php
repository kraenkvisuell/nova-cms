@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'hero',
])

<div class="
    mb-12 w-full min-h-hero-lg xl:min-h-hero-xl bg-gray-800
    justify-center items-center flex flex-col tracking-wide py-12
    @if($loop->first)
        -mt-24
    @endif
">
    @if($field->slides)
        <x-content-blocks.hero.images :field="$field"/>
    @endif

    <x-building-blocks.section>
        @if($field->topline)
            <x-building-blocks.topline :layout="$layout">
                {{ $field->topline }}
            </x-building-blocks.topline>
        @endif

        @if($field->headline)
            <x-building-blocks.headline :layout="$layout">
                {{ $field->headline }}
            </x-building-blocks.headline>
        @endif

        @if($field->text)
            <x-building-blocks.text :layout="$layout">
                {!! $field->text !!}
            </x-building-blocks.text>
        @endif

        @if($field->main_button_text)
            <x-building-blocks.links
                :url="$field->main_button_link"
                :text="$field->main_button_text"
                :layout="$layout"
            />
        @endif

        @if($field->secondary_button_text)
            <x-building-blocks.links
                :url="$field->secondary_button_link"
                :text="$field->secondary_button_text"
                :layout="$layout"
            />
        @endif

        <div class="flex flex-row justify-center pt-6">
            <a href="#start" class="text-white hover:text-secondary
                h-5 pr-1 mt-0.5 flex transform rotate-90
            ">
                @include('svgs/arrow')
            </a>
        </div>
    </x-building-blocks.section>
</div>

<a name="start"></a>
