<div class="flex justify-center w-full h-full p-5 bg-slate-100">
    <div class="container flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
            <div class="flex justify-center">
                <div class="items-center flex flex-col justify-center space-y-5">
                    <div class="flex flex-col space-y-2">
                        <p class="font-serif text-center text-lg">Introducing </p>
                        <p class="font-serif text-center font-bold text-2xl">The Ink & Glam
                            <br> Science 1997
                        </p>
                    </div>
                    <img src="{{ asset('2.png') }}" alt="logo"
                        class="block h-2/4 w-auto fill-current text-gray-800 dark:text-gray-200 ocus:shadow-outline" />
                    <p class="text-center font-serif text-lg">
                        Barber is a person whose occupation is mainly to cut dress groom style and shave men's and boys'
                        hair. A barber's place of work is known as a "barbershop" or a "barber's". Barbershops are also
                        places of social interaction and public discourse. In some instances, barbershops are also
                        public forums.
                    </p>
                    <a href={{ Route('aboutus') }}> <button
                            class=" bg-orange-900 p-3 px-4 dark:bg-opacity-60 text-white hover:ease-in-out hover:bg-opacity-90 hover:tracking-wide animate-pulse hover:animate-none duration-500">MORE
                            ABOUT US</button></a>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="grid grid-cols-6 col-span-2 gap-2 p-5">
                    <div class=" overflow-hidden rounded-xl col-span-3 max-h-[14rem]">
                        <img class="h-full w-full object-cover " src="{{ asset('2.png') }}" alt="">
                    </div>
                    <div class=" overflow-hidden rounded-xl col-span-3 max-h-[14rem]">
                        <img class="h-full w-full object-cover  " src="{{ asset('2.png') }}" alt="">
                    </div>
                    <div class=" overflow-hidden rounded-xl col-span-2 max-h-[10rem]">
                        <img class="h-full w-full object-cover " src="{{ asset('2.png') }}" alt="">
                    </div>
                    <div class=" overflow-hidden rounded-xl col-span-2 max-h-[10rem]">
                        <img class="h-full w-full object-cover " src="{{ asset('2.png') }}" alt="">
                    </div>
                    <div class="relative overflow-hidden rounded-xl col-span-2 max-h-[10rem]">
                        <div
                            class="text-white text-xl absolute inset-0  bg-slate-900/80 flex justify-center items-center">
                            + 23
                        </div>
                        <img class="h-full w-full object-cover " src="{{ asset('2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
