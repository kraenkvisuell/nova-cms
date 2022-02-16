@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
])



<x-blocks.section>
    <div class="md:flex flex-row
        @if($field->images_position == "left")
            flex-row-reverse
        @endif
    ">
        <div class="md:w-1/2
            @if($field->images_position == "right")
                md:pr-12
            @endif
            @if($field->images_position == "left")
                md:pl-12
            @endif
        ">
            @if($field->topline)
                <x-blocks.topline>
                    {{ $field->topline }}
                </x-blocks.topline>
            @endif

            @if($field->headline)
                <x-blocks.headline>
                    {{ $field->headline }}
                </x-blocks.headline>
            @endif

          
            <div>
                {!! $field->text !!}
            </div>


            @if($field->bottom_links)
                <x-blocks.links
                    :links="$field->bottom_links"
                />
            @endif
        </div>

        <div class="md:w-1/2">
            @if($field->images)
                @foreach($field->images as $image)
                    <x-blocks.image
                        :title="$image->title"
                        :src="$image->image"
                    />
                @endforeach
            @endif
        </div>
    </div>
</x-blocks.section>
