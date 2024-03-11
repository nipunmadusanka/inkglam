<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div class="justify-center w-full h-auto bg-slate-400  p-5 mb-5">
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                    <div class="justify-center grid-rows-2 top-0 p-3">
                        <div class="flex justify-center items-center p-3 top-0">
                            <img class=" h-64 w-auto m-2" src="{{ asset('mainservice/' . $result->image) }}"
                                alt="">
                        </div>
                    </div>
                    <div class="flex justify-start top-0 p-3">
                        <div class="flex flex-col justify-start space-y-16 text-start p-3 top-0">
                            <div class="flex-col space-y-2">
                                <p class="font-serif font-bold text-2xl text-white">
                                    {{ $result->name }}
                                </p>
                                <div class="flex">
                                    <p class="font-serif text-lg">
                                        Description : {{ '  ' . $result->description }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="font-serif text-lg flex">
                                        Active :
                                        @if ($result->status == 1)
                                            Yes
                                        @elseif ($result->status == 0)
                                            No
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('pages.product.product');
    @endif
</x-app-layout>


