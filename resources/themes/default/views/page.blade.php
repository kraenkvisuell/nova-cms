<x-layout.layout
    :browserTitle="($page->browser_title ?: 'Schloss Bödigheim | '.$page->title)"
    :metaDescription="$page->meta_description"
>
    @if($page->contentBlocks())
        @foreach($page->contentBlocks() as $contentBlock)
            @if ($loop->first && $contentBlock->block != 'hero')
                <div class="bg-lightest-grey h-12"></div>
            @endif

            @if(!@optional($contentBlock->field)->hide)
                <x-parts.content-block :contentBlock="$contentBlock" :index="$loop->index" />
            @endif

            @if ($loop->last)
                <div class="bg-lightest-grey h-12"></div>
            @endif
        @endforeach
    @endif
</x-layout.layout>
