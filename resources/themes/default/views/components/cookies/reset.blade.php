<div 
    x-data="{
        sendForm() {
            let data = new FormData();
            data.append('functionalCookiesAccepted', 0);
            data.append('essentialCookiesAccepted', 0);
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
    <button
        class="
            border border-black
            text-main-sm leading-tight
            px-[10px] pt-[5px] pb-[3px]
            mb-[5px]
        "
        x-on:click="sendForm()"
    >
    {{ __('nova-cms::settings.reset_cookie_settings') }}
    </button>
</div>
