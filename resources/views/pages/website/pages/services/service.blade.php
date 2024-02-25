<div class="flex justify-center items-center p-5 w-full h-auto bg-orange-50 font-serif">
    <div class="container flex justify-center">
        <div class="flex flex-col py-16 space-y-2">
            <div class="flex justify-center text-center">
                <p class="text-center text-xl font-medium">minor heading text here</p>
            </div>
            <div class="flex justify-center text-center">
                <h1 class="text-center text-4xl font-medium">Our Services</h1>
            </div>
            <div class="flex justify-center text-center pb-5">
                .......................................
            </div>
            <div class="flex justify-center items-center">
                <div class="container">
                    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($serviceData as $result)
                            {{-- <div class="flex justify-center bg-gray-200 py-1 p-6 overflow-hidden transition-all duration-150 ease-in-out">
                                <div class="items-center flex flex-col justify-center space-y-2">
                                    <img src="{{ asset('images/' . $result->image) }}" alt="logo"
                                        class="block p-5 h-2/4 w-auto fill-current text-gray-800 dark:text-gray-200 ocus:shadow-outline" />
                                    <h1 class="text-center text-4xl font-medium">{{ $result->name }}</h1>
                                    <p class="text-center font-serif text-sm">
                                        {{ implode(' ', array_slice(str_word_count(strip_tags($result->description), 1), 0, 15)) }}
                                    </p>
                                </div>
                            </div> --}}
                            <a href={{ Route('service.appoinment', ['id' => $result->id]) }} >
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
                                    class="flex justify-center bg-gray-200 py-1 p-6 overflow-hidden transition-all duration-500 ease-in-out transform opacity-0"
                                    x-bind:class="{ 'opacity-100 translate-y-0': loaded }">
                                    <div class="items-center flex flex-col justify-center space-y-2">
                                        <img src="{{ asset('images/' . $result->image) }}" alt={{ $result->name }}
                                            class="block p-5 h-2/4 w-auto fill-current text-gray-800 dark:text-gray-200 focus:shadow-outline" />
                                        <h1 class="text-center text-4xl font-medium">{{ $result->name }}</h1>
                                        <p class="text-center font-serif text-sm">
                                            {{ implode(' ', array_slice(str_word_count(strip_tags($result->description), 1), 0, 15)) }}
                                        </p>
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
