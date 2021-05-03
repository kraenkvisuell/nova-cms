@props([
    'page',
])

<a name="start"></a>
<div class="w-screen h-96 bg-primary z-30 js-hero-heigth">
    {{-- <img
        class="absolute top-0 left-0 object-cover w-screen h-96 opacity-35"
        src=""
    /> --}}
    <div class="absolute top-0 left-0 w-screen h-96 opacity-25"
        style="
            background: linear-gradient(45deg, blue 26%, transparent 0%), linear-gradient(225deg, blue 26%, transparent 0%);
            background-size: 6px 6px;
            background-position: 0 0, 3px 3px;
        "
    ></div>
    <x-project.letters />
</div>

<div class="w-full flex justify-center items-center px-8">
    <div class="w-full lg:max-w-container-xl xl:max-w-container-2xl">
        <div class="w-full bg-white -mt-56 lg:-mt-64 z-40 flex flex-col justify-center items-center
            pt-10 md:pt-16 xl:pt-20 px-8 md:px-20 xl:px-24 min-h-56 lg:min-h-64">
            <h2 class="font-sans-bold text-secondary text-center pb-8">
                Deutsche Akademie der Darstellenden Künste
            </h2>
            <h1 class="
                text-3xl md:text-4xl xl:text-5xl font-sans font-bold
                leading-snug text-center pb-10
            ">
                {{ $page->title }}
            </h1>
            <a href="/" class="
                border border-primary w-56 xl:w-64 h-10 xl:h-12 hover:border-secondary flex pl-4 xl:pl-5 pt-2
                text-primary hover:text-secondary rounded-full
            ">
                <div class="flex h-3 xl:h-3.5 mt-1.5 xl:mt-2 mr-2 transform rotate-180">
                    @include('svgs/arrow')
                </div>
                <p class="font-semibold font-xl">Zurück zur Startseite</p>
            </a>
        </div>
    </div>
</div>
