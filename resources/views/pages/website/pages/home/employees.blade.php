<div class="flex justify-center items-center p-5 w-full h-auto bg-[#181818] font-serif">
    <div class="container flex justify-center">
        <div class="flex flex-col py-16 space-y-2 text-slate-50">
            <div class="flex justify-center text-center">
                <p class="text-center text-xl font-medium text-amber-500">Collaborative synergy.</p>
            </div>
            <div class="flex justify-center text-center">
                <h1 class="text-center text-4xl font-bold text-amber-500 pb-5">Our Team</h1>
            </div>
            <div class="flex justify-center items-center">
                <div class="container">
                    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($employeedata->take(8) as $result)
                            <div x-data="{ loaded: false }" x-ref="content" x-init="() => {
                                let observer = new IntersectionObserver((entries) => {
                                    entries.forEach(entry => {
                                        if (entry.isIntersecting) {
                                            loaded = true;
                                            observer.disconnect();
                                        }
                                    });
                                });
                                observer.observe($refs.content);
                            }"
                                class="flex justify-center bg-gray-200 overflow-hidden transition-all duration-500 ease-in-out transform opacity-0 "
                                x-bind:class="{ 'opacity-100 translate-y-0': loaded }">
                                <a href="{{ Route('pages.viewemployeprofile', ['id' => $result->id]) }}">
                                    <div
                                        class="group items-center flex justify-center relative hover:bg-[#0D0F1C]/80 ease-in-out transition hover:scale-110">
                                        <img src="{{ asset('employeePhotos/' . $result->image) }}" alt="logo"
                                            class="block h-full w-full fill-current text-gray-800 dark:text-gray-200 focus:shadow-outline group-hover:opacity-25" />

                                        <!-- Text hidden by default, shown on group hover -->
                                        <div
                                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 container items-center">
                                            <p class="text-center text-white text-lg font-bold">
                                                {{ $result->fname . ' ' . $result->lname }}</p>
                                            <p class="text-center text-base font-serif font-medium">
                                                {{ $result->position }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
