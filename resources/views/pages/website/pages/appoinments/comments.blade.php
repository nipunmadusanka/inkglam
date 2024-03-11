<div class="flex justify-center w-full h-auto p-4 bg-[#343232] ">
    <div class="container items-center bg-[#B2B2B2] shadow-md rounded-xl">
        <div class="flex flex-col">
            <div class="items-start p-2 py-4">Ratings & Reviews</div>
            @foreach ($ratings as $rating)
                <div class=" grid grid-cols-1 md:grid-cols-8">
                    <div class=" col-span-2 border-t md:border-y md:border-r border-neutral-400 p-5 space-y-2">
                        <div class=" items-start">
                            {{-- @include('pages.website.pages.appoinments.numberofrating') --}}

                            <div class='flex flex-row gap-3'>
                                @for ($i = 0; $i < $rating->star; $i++)
                                    <svg class="h h-5 transition-all duration-100  fill-yellow-300 cursor-pointer"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                                        </path>
                                    </svg>
                                @endfor
                                {{-- <div>
                                    <p>{{ $rating->star }}</p>
                                </div> --}}
                            </div>


                        </div>
                        <div class=" items-start">
                            <p class=" text-sm">{{ $rating->user->name }}</p>
                        </div>
                        <div class=" items-start">
                            <p class="">{{ $rating->created_at }} </p>
                        </div>
                    </div>
                    <div class="col-span-6 border-b md:border-y border-neutral-400 p-5">
                        <p class=" items-start">
                            User : {{ $rating->comment }}
                        </p>
                        <div class=" flex text-right justify-end">
                            <p> {{ $rating->admin_reply }} </p> <span class=" italic"> : Admin Reply </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
