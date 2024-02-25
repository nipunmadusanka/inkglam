<!-- Component: Logos carousel -->
<div class="relative w-full glide-09 py-8">
    <!-- Slides -->
    <div data-glide-el="track">
        <ul class="whitespace-no-wrap flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform] relative flex w-full overflow-hidden">
            <li>
                <img src={{ asset('2.png') }} class="w-auto h-20 max-w-full max-h-full m-auto " />
            </li>
            <li>
                <img src={{ asset('2.png') }} class="w-auto h-20 max-w-full max-h-full m-auto " />
            </li>
            <li>
                <img src={{ asset('2.png') }} class="w-auto h-20 max-w-full max-h-full m-auto " />
            </li>
            <li>
                <img src={{ asset('2.png') }} class="w-auto h-20 max-w-full max-h-full m-auto " />
            </li>
            <li>
                <img src={{ asset('2.png') }} class="w-auto h-20 max-w-full max-h-full m-auto " />
            </li>
            <li>
                <img src={{ asset('2.png') }} class="w-auto h-20 max-w-full max-h-full m-auto " />
            </li>
        </ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>

<script>
    var glide09 = new Glide('.glide-09', {
        type: 'carousel',
        autoplay: 1,
        animationDuration: 4500,
        animationTimingFunc: 'linear',
        perView: 3,
        classes: {
            activeNav: '[&>*]:bg-slate-700',
        },
        breakpoints: {
            1024: {
                perView: 2
            },
            640: {
                perView: 1,
                gap: 36
            }
        },
    });

    glide09.mount();
</script>
<!-- End Logos carousel -->
