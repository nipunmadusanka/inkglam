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
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @if (count($results) > 0)
                            @foreach ($results as $result)
                                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden bg-slate-50">
                                    <a href={{ Route('page.oneitemview', ['id' => $result->id]) }} class="">
                                        <div class="flex items-end justify-end h-56 w-full bg-cover"
                                            style="background-image: url({{ asset('sellitems/' . $result->image) }})">
                                        </div>
                                    </a>
                                    <div class="px-5 py-3">
                                        <h3 class="text-black uppercase">{{ $result->item }}</h3>

                                        <p class="mb-2 text-base text-gray-700 no-underline">
                                            {{ Illuminate\Support\Str::limit($result->description, 30) }}
                                        </p>
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 items-center justify-between bottom-0">
                                            <span class="text-3xl font-bold text-gray-900">Rs.
                                                {{ $result->price }}</span>

                                            <div class="flex justify-end">
                                                <a href={{ Route('addcart', ['id' => $result->id]) }}
                                                    class="flex justify-center items-center text-white bg-amber-400 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm w-16 px-2 py-2 lg:px-5 lg:py-2.5 text-center dark:bg-amber-600 dark:amber:bg-blue-700 dark:focus:ring-amber-800">
                                                    {{-- Add to cart --}}
                                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path
                                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- component -->
                            @endforeach
                        @else
                            <div class="flex justify-center text-xl text-center col-span-4">No product</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"
    integrity="sha384-Mnnl/rABiL6z5Vz2ncT3bAqPcIqByVddQ3Lkv6dHb5SdtUUNxLGda/w5zPv8J8bH" crossorigin="anonymous">
</script>
