<div class="flex justify-center items-center p-5 w-full h-auto bg-[#343232] font-serif">
    <div class="container flex justify-center">
        <div class="flex flex-col py-16 space-y-2 text-slate-50">
            {{-- <div class="flex justify-center text-center">
                <p class="text-center text-xl font-medium text-amber-500">Our Main Services</p>
            </div> --}}
            <div class="flex justify-center text-center pb-5">
                <h1 class="text-center text-4xl font-bold text-amber-500">Products</h1>
            </div>
            {{-- <div class="flex justify-center text-center pb-5">
                .......................................
            </div> --}}
            <div class="flex justify-center items-center">
                <div class="container">
                    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-2">

                        @foreach ($results as $result)
                            <a href="" class="bg-[#B2B2B2] rounded-lg">
                                <div x-data="{ loaded: false }" x-ref="content" x-init="() => {
                                    let observer = new IntersectionObserver((entries) => {
                                        entries.forEach(entry => {
                                            if (entry.isIntersecting) {
                                                loaded = true;
                                                observer.disconnect(); // Disconnect the observer once the element is in view
                                            }
                                        });
                                    });
                                    observer.observe($refs.content);
                                }"
                                    class="flex justify-center py-3 p-3 overflow-hidden transition-all duration-500 ease-in-out transform opacity-0"
                                    x-bind:class="{ 'opacity-100 translate-y-0': loaded }">
                                    <div class="items-center text-black grid grid-rows-2">
                                        <div class="flex justify-center">
                                            <img src={{ asset('sellitems/' . $result->image) }} alt={{ $result->title }}
                                                class="block h-48 w-auto fill-current text-gray-800 object-cover dark:text-gray-200 focus:shadow-outline" />
                                        </div>
                                        <div class="space-y-2 p-3">
                                            <h1 class="text-center text-4xl font-medium">{{ $result->title }}</h1>
                                            <p class="text-center font-serif text-sm">
                                               {{$result->description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"
    integrity="sha384-Mnnl/rABiL6z5Vz2ncT3bAqPcIqByVddQ3Lkv6dHb5SdtUUNxLGda/w5zPv8J8bH" crossorigin="anonymous">
</script>