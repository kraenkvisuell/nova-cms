@php
//dd($page->topBanners());
@endphp
<x-theme.layout.layout>

@if($page->contentBlocks())
    <div class="
        mt-20
    ">
        @foreach($page->contentBlocks() as $contentBlock)
            <x-theme.parts.content-block :contentBlock="$contentBlock" />
        @endforeach
    </div>
@endif
</x-theme.layout.layout>
