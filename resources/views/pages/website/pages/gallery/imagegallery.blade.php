<section class="h-screen py-3">
    <div x-data="{
        imageGalleryOpened: false,
        imageGalleryActiveUrl: null,
        imageGalleryImageIndex: null,
        imageGalleryOpen(event) {
            this.imageGalleryImageIndex = event.target.dataset.index;
            this.imageGalleryActiveUrl = event.target.src;
            this.imageGalleryOpened = true;
        },
        imageGalleryClose() {
            this.imageGalleryOpened = false;
            setTimeout(() => this.imageGalleryActiveUrl = null, 300);
        },
        imageGalleryNext() {
            if (this.imageGalleryImageIndex == this.$refs.gallery.childElementCount) {
                this.imageGalleryImageIndex = 1;
            } else {
                this.imageGalleryImageIndex = parseInt(this.imageGalleryImageIndex) + 1;
            }
            this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
        },
        imageGalleryPrev() {
            if (this.imageGalleryImageIndex == 1) {
                this.imageGalleryImageIndex = this.$refs.gallery.childElementCount;
            } else {
                this.imageGalleryImageIndex = parseInt(this.imageGalleryImageIndex) - 1;
            }

            this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;

        }
    }" @image-gallery-next.window="imageGalleryNext()"
        @image-gallery-prev.window="imageGalleryPrev()" @keyup.right.window="imageGalleryNext();"
        @keyup.left.window="imageGalleryPrev();" x-init="imageGalleryPhotos = $refs.gallery.querySelectorAll('img');
        for (let i = 0; i < imageGalleryPhotos.length; i++) {
            imageGalleryPhotos[i].setAttribute('data-index', i + 1);
        }" class="w-full h-full select-none">
        <div class="max-w-6xl mx-auto duration-1000 delay-300 opacity-0 select-none ease animate-fade-in-view"
            style="translate: none; rotate: none; scale: none; opacity: 1; transform: translate(0px, 0px);">
            <ul x-ref="gallery" id="gallery" class="grid grid-cols-2 gap-5 lg:grid-cols-5">
                @foreach ($results as $item)
                    <li
                        class="group items-center flex justify-center rounded relative hover:bg-stone-900 overflow-hidden">
                        <img x-on:click="imageGalleryOpen" src="{{ asset('imagegallry/' . $item->image) }}"
                            class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4] group-hover:opacity-25 ease-in-out transition hover:scale-110"
                            alt="photo gallery image 10">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 container items-center">
                            <p class="text-center text-white text-lg font-bold">{{ $item->name }}</p>
                            <p class="text-center text-sm font-serif font-thin text-white">{{ $item->description }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <template x-teleport="body">
            <div x-show="imageGalleryOpened" x-transition:enter="transition ease-in-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:leave="transition ease-in-in duration-300"
                x-transition:leave-end="opacity-0" @click="imageGalleryClose" @keydown.window.escape="imageGalleryClose"
                x-trap.inert.noscroll="imageGalleryOpened"
                class="fixed inset-0 z-[99] flex items-center justify-center bg-black bg-opacity-50 select-none cursor-zoom-out"
                x-cloak>
                <div class="relative flex items-center justify-center w-11/12 xl:w-4/5 h-11/12">
                    <div @click="$event.stopPropagation(); $dispatch('image-gallery-prev')"
                        class="absolute left-0 flex items-center justify-center text-white translate-x-10 rounded-full cursor-pointer xl:-translate-x-24 2xl:-translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </div>
                    <img x-show="imageGalleryOpened" x-transition:enter="transition ease-in-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-50"
                        x-transition:leave="transition ease-in-in duration-300"
                        x-transition:leave-end="opacity-0 transform scale-50"
                        class="object-contain object-center w-full h-full select-none cursor-zoom-out"
                        :src="imageGalleryActiveUrl" alt="" style="display: none;">
                    <div @click="$event.stopPropagation(); $dispatch('image-gallery-next');"
                        class="absolute right-0 flex items-center justify-center text-white -translate-x-10 rounded-full cursor-pointer xl:translate-x-24 2xl:translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </template>
    </div>
</section>