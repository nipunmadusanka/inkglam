<!-- Component: Slider with indicators inside -->
<div class="relative h-screen glide-02 p-0">
    <!-- Slides -->
    <div class="overflow-hidden h-full font-serif" data-glide-el="track">
        <ul
            class="relative w-full overflow-hidden h-full p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
            <li class="relative">
                <img src="https://Tailwindmix.b-cdn.net/image-03.jpg" alt="Your Image Alt Text"
                    class="object-cover object-center w-full h-full" />
                <div class="absolute z-0 text-start text-black pl-16 lg:pl-6 -translate-x-1/2  -translate-y-1/2 top-1/2 left-1/4">
                    <div class="lg:space-y-4 space-y-1">
                        <p class="text-lg font-medium md:text-xl">Your Paragraph Text 1</p>
                        <h1 class="font-bold text-lg md:text-6xl">Your Heading Text</h1>
                        <p class="text-base md:text-xl">Your Paragraph Text 2</p>
                        <button class=" bg-orange-900 md:p-3 md:px-4 p-2 dark:bg-opacity-60 text-white hover:ease-in-out hover:bg-opacity-90 hover:tracking-wide hover:duration-200 duration-500">MAKE APPOINTMENT</button>
                    </div>
                </div>
            </li>

            <li><img src="https://Tailwindmix.b-cdn.net/image-04.jpg" class="object-cover object-center w-full h-full" />
            </li>
            <li><img src="https://Tailwindmix.b-cdn.net/image-05.jpg" class="object-cover object-center w-full h-full" />
            </li>
            <li><img src="https://Tailwindmix.b-cdn.net/image-01.jpg" class="object-cover object-center w-full h-full" />
            </li>
            <li><img src="https://Tailwindmix.b-cdn.net/image-02.jpg" class="object-cover object-center w-full h-full" />
            </li>
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
        <button class="p-4 group" data-glide-dir="=3" aria-label="goto slide 4"><span
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
