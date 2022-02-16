@props([
    'slides',
])

@foreach($slides as $slide)
    <div class="opacity-0 absolute top-0 left-0 w-full h-full
        @if($loop->first)
            opacity-100
        @endif
    ">
        <img
            alt="{{ $slide->caption }}"
            class="opacity-20 absolute top-0 left-0 w-full h-full object-cover"
            src="{{ nova_cms_image($slide->image) }}"
        />
        <p class="text-gray-400 font-title text-xs xl:text-sm
            absolute bottom-0 left-0 w-full py-4 text-center
        ">
            {{ $slide->caption }}
        </p>
    </div>
@endforeach
