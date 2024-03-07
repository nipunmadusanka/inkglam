<div class="relative w-full h-screen overflow-hidden bg-[#181818]">
    <img src="{{ asset('bottom.jpg') }}" alt=""
        class="top-0 right-0 object-cover object-center w-full h-full dark:to-black opacity-75">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">
        <div class="flex flex-col justify-center space-y-2">
            <div class="space-y-6 items-center text-center text-slate-50">
                <h1 class=" text-center text-4xl font-serif font-extrabold">Making You Look Good
                    Is In Our Haritage.</h1>

                <p class="text-center font-light text-base">Barber is a person whose occupation is mainly to cut
                    dress
                    groom <br />
                    style and shave men's and boys hair.</p>
            </div>
            <div class="flex justify-center items-center pt-4">

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
    </div>
</div>
