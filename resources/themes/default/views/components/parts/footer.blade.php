<div class="
    flex justify-center
    z-10 text-sm text-white
">
    <div class="
        w-full px-6 just-after-lg:px-0 pt-8 pb-4
        md:flex flex-row-reverse justify-between

    ">
        <div class="md:flex md:pl-12 flex-col justify-between md:text-right">
            <div>
                <br>
                Die Schlossanlage ist Privatbesitz und steht für Besichtigungen nicht zur Verfügung.
                <br><br>
            </div>

            <ul>
                @foreach (nova_cms_menu('footer') as $menuItem)
                    <li class="
                        inline-block pr-4 md:pr-0 md:pl-4
                    ">
                        <a
                            href="{{ $menuItem->url }}"
                            class="
                                underline
                            "
                        >
                            {{ $menuItem->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="
            md:mr-8 mt-4 md:mt-0
        ">
            <em>Kontakt:</em><br>
            {!! nova_cms_setting('address') !!}
            <br>
            <em>Telefon</em>: {{ nova_cms_setting('phone') }}<br>
            <em>E-Mail</em>: <a href="mailto:{{ nova_cms_setting('email') }}" class="underline">
                {{ nova_cms_setting('email') }}
            </a>
            <br><br>
            © {{ date('Y') }} Freiherrlich Rüdt von Collenberg'sche Schlossgesellschaft
        </div>
    </div>
</div>
