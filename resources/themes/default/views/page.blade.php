<x-layout.layout :browserTitle="'Titel || '.($page->browser_title ?: $page->title)">

    <x-parts.navi />

    <div class="w-full h-32"></div>

    @if($page->contentBlocks())
        @foreach($page->contentBlocks() as $contentBlock)
            <a name="{{ $contentBlock->field->topline }}"></a>
            <x-parts.content-block
                :contentBlock="$contentBlock"
                :loop="$loop"
                context="page"
            />
        @endforeach
    @endif

</x-layout.layout>
