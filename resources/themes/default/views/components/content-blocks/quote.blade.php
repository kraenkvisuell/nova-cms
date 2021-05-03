@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'quote',
    'buildingBlock' => 'quote',
])

{{--
    Fehlende Felder
        > Topline
 --}}

<x-building-blocks.section>
    <x-building-blocks.element>
        <div class="md:flex">
            <div class="flex-none w-32 mx-auto mb-8 md:mb-0 md:mr-10">
                @foreach($field->images as $image)
                    <div class="aspect-w-1 aspect-h-1 mb-4">
                        <div class="w-full h-full rounded-full">
                            @if($image->image)
                                <img
                                    class="w-full h-full object-cover rounded-full"
                                    src="{{ nova_cms_image($image->image) }}"
                                />
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                @if($field->quote)
                    <x-building-blocks.headline :layout="$layout" :buildingBlock="$buildingBlock">
                        {!! $field->quote !!}
                    </x-building-blocks.headline>
                @endif

                @if($field->author)
                    <x-building-blocks.topline :layout="$layout">
                        — {!! $field->author !!}
                    </x-building-blocks.topline>
                @endif

                @if($field->bottom_links)
                    @foreach($field->bottom_links as $bottomLink)
                        <x-building-blocks.links
                            :url="$bottomLink->link_url"
                            :text="$bottomLink->link_text"
                            :layout="$layout"
                            :field="$field"
                            :link="$bottomLink"
                        />
                    @endforeach
                @endif
            </div>
        </div>
    </x-building-blocks.element>
</x-building-blocks.section>
