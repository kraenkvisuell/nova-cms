@props([
    'browserTitle' => 'Binario11',
])

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, minimum-scale=1.0, maximum-scale=4.0" />
        <meta name="format-detection" content="telephone=no" />

        <title>{{ $browserTitle }}</title>

        <meta content="index, follow" name="robots">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <link rel="icon" href="/img/favicon.png" type="image/png">
        <link rel="stylesheet" href="https://use.typekit.net/pjx2nyy.css">

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <link href="{{ mix(config('nova-cms.main_css_path')) }}" rel="stylesheet">

        <script src="{{ mix('js/app.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>

    <body class="
        font-text leading-normal text-base xl:text-lg overflow-x-hidden text-gray-800
    ">
        {{ $slot }}

        <x-parts.footer />

        <script src="{{ mix('js/alpine-and-spruce.js') }}"></script>

        <script>
            window.Spruce.store('harmonica', {
                openItem: '',
                toggleItem(item) {
                    if (this.openItem == item) {
                        this.openItem = '';
                    } else {
                        this.openItem = item;
                    }
                }
            });


            function soundPlayer(ref) {
                return {
                    playing: false,
                    duration: '00:00',
                    position: '00:00',
                    percent: 0,
                    volume: 70,
                    seekInterval: null,
                    initialize() {
                        this.$refs[ref].oncanplay = function() {
                            this.duration = this.timify(this.$refs[ref].duration);
                            this.$refs[ref].volume = 0.7;
                        }.bind(this);

                        this.$refs[ref].onended = function() {
                            this.playing = false;
                        }.bind(this);
                    },
                    play() {
                        this.playing = true;
                        this.$refs[ref].play();
                        this.startCheckingCurrentTime();
                    },
                    pause() {
                        this.playing = false;
                        this.$refs[ref].pause();
                        this.stopCheckingCurrentTime();
                    },
                    setVolume(x) {
                        let $volume = $('#'+ref).find('.js-volume');
                        let w = $volume.width();
                        let newPosition = (x - $volume.offset().left) / w;

                        this.$refs[ref].volume = newPosition;
                        this.volume = this.$refs[ref].volume * 100;
                    },
                    seek(x) {
                        let $seekbar = $('#'+ref).find('.js-seekbar');
                        let w = $seekbar.width();
                        let newPosition = (x - $seekbar.offset().left) / w;

                        this.$refs[ref].currentTime = newPosition * this.$refs[ref].duration;
                        this.setCurrentTime();
                    },
                    startCheckingCurrentTime () {
                        this.seekInterval = window.setInterval(function(){
                            this.setCurrentTime();
                        }.bind(this), 100);
                    },
                    stopCheckingCurrentTime () {
                        clearInterval(this.seekInterval);
                    },
                    setCurrentTime () {
                        this.position = this.timify(this.$refs[ref].currentTime);
                        this.percent = this.$refs[ref].currentTime / this.$refs[ref].duration * 100;
                    },
                    timify(seconds) {
                        let hours = Math.floor(seconds / 3600);
                        let minutes = Math.floor(seconds / 60);
                        let str = '';

                        if (hours) {
                            str = String(hours) + ':';
                        }

                        if (hours) {
                            minutes -= hours * 60;
                        }

                        let minuteStr = String(minutes);
                        if (minuteStr.length == 1) {
                            minuteStr = '0' + minuteStr;
                        }
                        str += minuteStr;

                        if (minutes) {
                            seconds -= minutes * 60;
                        }

                        let secondStr = String(Math.round(seconds));

                        if (secondStr.length == 1) {
                            secondStr = '0' + secondStr;
                        }

                        str += ':' + secondStr;

                        return str;
                    }
                }
            }
        </script>
    </body>
</html>
