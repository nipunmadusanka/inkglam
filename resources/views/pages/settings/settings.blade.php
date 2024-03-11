<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div>
            <div class="p-4 flex flex-col bg-slate-400">
                <div class="container">
                    <div class="flex justify-center items-center p-5 w-auto">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-2">
                            <a href="{{ route('gallerysetting') }}" >
                                <div
                                id="gallery" class="p-2 min-w-20 md:p-6 border bg-slate-300  border-slate-950 shadow-xl rounded-lg flex justify-center cursor-pointer overflow-hidden hover:bg-sky-300 ease-in-out transition-all duration-300 hover:duration-500 hover:text-white">
                                    <div class="space-y-1 hover:scale-110 ">
                                        <div class="flex justify-center items-center">
                                            <i class="fas fa-store text-3xl"></i>
                                        </div>
                                        <div class="p-2">
                                            Gallery Setting
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('gallerysetting') }}" >
                                <div
                                id="gallery1" class="p-2 min-w-20 md:p-6 border bg-slate-300  border-slate-950 shadow-xl rounded-lg flex justify-center cursor-pointer overflow-hidden hover:bg-sky-300 ease-in-out transition-all duration-300 hover:duration-500 hover:text-white">
                                    <div class="space-y-1 hover:scale-110 ">
                                        <div class="flex justify-center items-center">
                                            <i class="fas fa-store text-3xl"></i>
                                        </div>
                                        <div class="p-2">
                                            Gallery Setting
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="p-2 border-2">
                                hhh
                            </div>
                            <div class="p-2 border-2">
                                hhh
                            </div>
                            <div class="p-2 border-2">
                                hhh
                            </div>
                            <div class="p-2 border-2">
                                hhh
                            </div>
                            <div class="p-2 border-2">
                                hhh
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-10">
                @yield('websettings')
            </div>
        </div>
    @endif
</x-app-layout>

<script>
    $(document).ready(function() {
        let searchParams = new URLSearchParams(window.location.search);

        // Check if the 'redirected' parameter is not set
        if (!searchParams.has('redirected')) {
            // Redirect and append the parameter to avoid future redirects
            window.location.href = "{{ route('gallerysetting') }}?redirected=true";
        } else {
            // 'redirected' parameter is set
            $('#gallery').addClass('bg-sky-300');
        }

    });
</script>
