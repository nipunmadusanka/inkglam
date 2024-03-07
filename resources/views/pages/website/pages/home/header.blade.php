<!-- Component: Slider with indicators inside -->
<div class="relative h-screen glide-02 p-0">
    <!-- Slides -->
    <div class="overflow-hidden h-full font-serif" data-glide-el="track">
        <ul
            class="relative w-full overflow-hidden h-full p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
            <li class="relative">
                <img src="{{ asset('main (1).jpg') }}" alt="Your Image Alt Text"
                    class="object-cover object-center w-full h-full" />
                <div class="absolute z-0 text-start text-white pl-16 lg:pl-6 -translate-x-1/2  -translate-y-1/2 top-1/2 left-1/4">
                    <div class="lg:space-y-9 space-y-3">
                        {{-- <p class="text-lg font-medium md:text-xl">Your Paragraph Text 1</p> --}}
                        <h1 class="font-bold text-lg md:text-6xl text-amber-500">BODY PIERCING</h1>
                        <p class=" text-lg md:text-xl">Body piercing involves puncturing skin for jewelry.</p>
                        <div>
                            <a href={{ Route('ourservices') }}>
                                <button
                                    class=" border-4 border-amber-500 bg-black md:p-3 md:px-4 p-2 dark:bg-opacity-30 text-white hover:ease-in-out hover:bg-opacity-60 hover:tracking-wide hover:duration-200 duration-300">MAKE
                                    APPOINTMENT
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="relative">
                <img src="{{ asset('main (2).jpg') }}" alt="Your Image Alt Text"
                    class="object-cover object-center w-full h-full" />
                <div class="absolute z-0 text-start text-white pl-16 lg:pl-6 -translate-x-1/2  -translate-y-1/2 top-1/2 left-1/4">
                    <div class="lg:space-y-9 space-y-3">
                        {{-- <p class="text-lg font-medium md:text-xl">Your Paragraph Text 1</p> --}}
                        <h1 class="font-bold text-lg md:text-6xl text-amber-500">BODY TATTOO</h1>
                        <p class="text-lg md:text-xl">Body tattoos use ink for skin art.</p>
                        <div>
                            <a href={{ Route('ourservices') }}>
                                <button
                                    class=" border-4 border-amber-500 bg-black md:p-3 md:px-4 p-2 dark:bg-opacity-30 text-white hover:ease-in-out hover:bg-opacity-60 hover:tracking-wide hover:duration-200 duration-300">MAKE
                                    APPOINTMENT
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="relative">
                <img src="{{ asset('main (3).jpg') }}" alt="Your Image Alt Text"
                    class="object-cover object-center w-full h-full" />
                <div class="absolute z-0 text-start text-white pl-16 lg:pl-6 -translate-x-1/2  -translate-y-1/2 top-1/2 left-1/4">
                    <div class="lg:space-y-9 space-y-3">
                        {{-- <p class="text-lg font-medium md:text-xl">Your Paragraph Text 1</p> --}}
                        <h1 class="font-bold text-lg md:text-6xl text-amber-500">TATTOO REMOVING</h1>
                        <p class="text-lg md:text-xl">Tattoo removal erases ink with lasers or other methods.</p>
                        <div>
                            <a href={{ Route('ourservices') }}>
                                <button
                                    class=" border-4 border-amber-500 bg-black md:p-3 md:px-4 p-2 dark:bg-opacity-30 text-white hover:ease-in-out hover:bg-opacity-60 hover:tracking-wide hover:duration-200 duration-300">MAKE
                                    APPOINTMENT
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            {{-- <li><img src="{{ asset('main (2).jpg') }}" class="object-cover object-center w-full h-full" />
            </li>
            <li><img src="{{ asset('main (3).jpg') }}" class="object-cover object-center w-full h-full" />
            </li> --}}
        </ul>
    </div>
    <!-- Indicators -->
    <div class="absolute bottom-0 flex items-center justify-center w-full gap-2" data-glide-el="controls[nav]">
        <button class="p-4 group" data-glide-dir="=0" aria-label="goto slide 1"><span
                class="block w-2 h-2 transition-colors duration-300 rounded-full ring-1 ring-slate-700 bg-white/20 focus:outline-none"></span></button>
        <button class="p-4 group" data-glide-dir="=1" aria-label="goto slide 2"><span
                class="block w-2 h-2 transition-colors duration-300 rounded-full ring-1 ring-slate-700 bg-white/20 focus:outline-none"></span></button>
        <button class="p-4 group" data-glide-dir="=2" aria-label="goto slide 3"><span
                class="block w-2 h-2 transition-colors duration-300 rounded-full ring-1 ring-slate-700 bg-white/20 focus:outline-none"></span></button>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>

<script>
    var glide02 = new Glide('.glide-02', {
        type: 'slider',
        focusAt: 'center',
        perView: 1,
        autoplay: 2000,
        animationDuration: 400,
        gap: 0,
        classes: {
            activeNav: '[&>*]:bg-slate-700',
        },

    });

    glide02.mount();
</script>
<!-- End Slider with indicators inside -->
