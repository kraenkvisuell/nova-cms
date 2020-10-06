@php
//dd($page->topBanners());
@endphp
<x-cms::layout.layout>
@if($page->topBanners())
    <x-cms::page.top-banners :banners="$page->topBanners()" />
@endif
</x-cms::layout.layout>
