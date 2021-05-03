@props([
    'person',
    'layout',
    'buildingBlock' => 'person',
])

<x-building-blocks.element>
    <div class="md:flex">
        <div class="flex-none w-32 mx-auto mb-8 md:mb-0 md:mr-10">
            <div class="aspect-w-1 aspect-h-1">
                <div class="w-full h-full rounded-full">
                    @if($person->image)
                        <img
                            class="w-full h-full object-cover rounded-full"
                            src="{{ nova_cms_image($person->image) }}"
                        />
                    @endif
                </div>
            </div>
        </div>

        <div>
            @if($person->name)
                <x-building-blocks.headline :layout="$layout" :buildingBlock="$buildingBlock">
                    {!! $person->name !!}
                </x-building-blocks.headline>
            @endif

            @if($person->role)
                <x-building-blocks.topline :layout="$layout">
                    {!! $person->role !!}
                </x-building-blocks.topline>
            @endif

            @if($person->description)
                <x-building-blocks.text :layout="$layout">
                    {!! $person->description !!}
                </x-building-blocks.text>
            @endif
        </div>
    </div>
</x-building-blocks.element>
