@if(@$bottomLinks)
    <div class="
        w-full pt-6
    ">

        @foreach($bottomLinks as $bottomLink)
            <div class="text-center mt-2">
                <a
                    href="{{ nova_cms_parse_link($bottomLink->link_url) }}"
                    class="
                        inline-block border border-main-red px-2 py-px
                        text-main-red italic
                    "
                >
                    » {{ $bottomLink->link_text }}
                </a>
            </div>
        @endforeach

    </div>
@endif
