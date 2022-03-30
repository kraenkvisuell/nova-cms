<div 
    class="
        fixed bottom-0 left-0 w-full
        z-50
        bg-white bg-opacity-[0.5] backdrop-blur
        border-t border-black
    "
    x-data="{
        formIsOpen: false,
        functionalCookiesAccepted: true,
        toggleForm() {
            this.formIsOpen = ! this.formIsOpen
        },
        sendForm() {
            let data = new FormData();
            data.append('functionalCookiesAccepted', this.functionalCookiesAccepted);
            data.append('_token', '{{ csrf_token() }}');

            fetch('{{ route('update-cookies-consent') }}', {
                method: 'post',
                body: data
            })
            .then((response) => {
                location.reload()
            })
        }
    }"
>
    <x-blocks.x-pad>
        <div class="py-[20px]">
            <div class="text-main-sm leading-snug">
                {!! __('nova-cms::settings.cookies_explanation') !!}
            </div>

            <div
                class="pt-[20px]"
                x-show="formIsOpen"
                x-cloak
            >   

                <div>
                    <input 
                        type="checkbox"
                        class="top-[2px] w-[16px] h-[16px]"
                        checked="checked"
                        disabled="disabled"
                    />
                    <label
                        class="ml-[4px]"
                    >
                        <strong>{!! __('nova-cms::settings.essential') !!}</strong>
                        <br>
                        <div class="text-main-sm leading-tightest">
                        {!! __('nova-cms::settings.essential_explanation') !!}
                        </div>
                    </label>
                </div>

                <div class="mt-[12px]">
                    <input 
                        type="checkbox"
                        class="top-[2px] w-[16px] h-[16px]"
                        id="acceptFunctionalCookies"
                        x-model="functionalCookiesAccepted"
                    />
                    <label
                        class="ml-[4px]"
                        for="acceptFunctionalCookies"
                    >
                        <strong>{!! __('nova-cms::settings.functional') !!}</strong>
                        <br>
                        <div class="text-main-sm leading-tightest">
                        {!! __('nova-cms::settings.functional_explanation') !!}
                        </div>
                    </label>
                </div>

                <div class="mt-[12px]">
                    <input 
                        type="checkbox"
                        class="top-[2px] w-[16px] h-[16px] opacity-50"
                        disabled="disabled"
                    />
                    <label
                        class="ml-[4px]"
                    >
                        <strong>{!! __('nova-cms::settings.marketing') !!}</strong>
                        <br>
                        <div class="text-main-sm leading-tightest">
                        {!! __('nova-cms::settings.marketing_explanation') !!}
                        </div>
                    </label>
                </div>
            </div>

            <div class="mt-[20px]">
                <button
                    class="
                        bg-black border border-black
                        text-main-sm leading-tight
                        text-white px-[10px] pt-[5px] pb-[3px]
                        mr-[10px] mb-[5px]
                    "
                    x-on:click="sendForm()"
                >
                    {{ __('nova-cms::settings.accept_and_save_cookies') }}
                </button>

                <button
                    class="
                        border border-black
                        text-main-sm leading-tight
                        px-[10px] pt-[5px] pb-[3px]
                        mb-[5px]
                    "
                    x-on:click="toggleForm()"
                >
                    <span x-show="!formIsOpen">
                    {{ __('nova-cms::settings.change_cookie_settings') }}
                    </span>

                    <span x-show="formIsOpen">
                        {{ __('nova-cms::settings.close_cookie_settings') }}
                    </span>
                </button>
            </div>
        </div>
    </x-blocks.x-pad>
</div>
