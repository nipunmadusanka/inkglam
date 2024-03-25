<x-app-layout>
    @if (Auth::user()->user_type == 0 || Auth::user()->user_type == 2)
        <div class="justify-center w-full h-auto bg-slate-400  p-5 mb-5">
            <div class="container flex items-center justify-center">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-1">
                    {{-- <div class="justify-center grid-rows-2 top-0 p-3">
                        <div class="flex justify-start items-start p-3 top-0">
                            <img class="h-full w-full m-2" src=""
                                alt="">
                        </div>
                    </div> --}}
                    <div class="flex justify-start top-0 p-3">
                        <div class="flex flex-col justify-start space-y-16 text-start p-3 top-0">
                            <div class="flex-col space-y-2">
                                <p class="font-serif font-bold text-2xl text-white">
                                    {{ $result->name }}
                                </p>
                                <div class="flex">
                                    <p class="font-serif text-lg">
                                        Email : {{ $result->name }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="font-serif text-lg">
                                        NIC : {{ $result->nic }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="font-serif text-lg">
                                        Email : {{ $result->email }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="font-serif text-lg flex">
                                        Active : Active

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex item-end justify-end">
                <a href="{{ route('viewmyChat', ['id' => $result->id]) }}">
                    <p class=" font-serif font-semibold text-lg text-blue-700"> Chat </p>
                </a>
            </div>
        </div>

        @include('pages.users.includepages.order');
    @endif
</x-app-layout>
