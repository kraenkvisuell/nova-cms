<x-layout.layout :browserTitle="($page->browser_title ?: $page->title)">

    @if($page->contentBlocks())
        @foreach($page->contentBlocks() as $contentBlock)
            <a name="{{ $contentBlock->field->anchor }}"></a>
            <x-parts.content-block
                :contentBlock="$contentBlock"
                :loop="$loop"
                context="page"
            />
        @endforeach
    @endif

</x-layout.layout>
