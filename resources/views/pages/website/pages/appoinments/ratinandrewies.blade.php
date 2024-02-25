<div class="flex justify-center w-full h-full p-5 bg-slate-100 border-t-2 border-b-2">
    <div class="container flex items-center justify-center">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <!-- component -->
            <div class="">
                <div class="grid grid-cols-8">
                    <div class="border-r-2 col-span-2 p-2">
                        <div class="items-start justify-start">
                            <p> 481 ratings </p>
                        </div>
                    </div>

                    <div class="col-span-6">
                        <div class="grid grid-col p-0">
                            <div class="p-3">
                                @include('pages.website.pages.appoinments.numberofrating')
                                @include('pages.website.pages.appoinments.numberofrating')
                                @include('pages.website.pages.appoinments.numberofrating')
                                @include('pages.website.pages.appoinments.numberofrating')
                                @include('pages.website.pages.appoinments.numberofrating')
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- comment form -->
            @auth

                <div class="mx-auto items-center justify-center shadow-lg max-w-lg bg-white">
                    <!-- component -->
                    <div class='rating flex flex-row gap-3 my-6 px-4'>
                        <svg id="1"
                            class="h-12 transition-all duration-100 fill-gray-400  fill-yellow-500  cursor-pointer"
                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                            </path>
                        </svg>
                        <svg id="2" class="h-12 transition-all duration-100 fill-gray-400  cursor-pointer"
                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                            </path>
                        </svg>
                        <svg id="3" class="h-12 transition-all duration-100 fill-gray-400  cursor-pointer"
                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                            </path>
                        </svg>
                        <svg id="4" class="h-12 transition-all duration-100 fill-gray-400  cursor-pointer"
                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                            </path>
                        </svg>
                        <svg id="5" class="h-12 transition-all duration-100 fill-gray-400  cursor-pointer"
                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                            </path>
                        </svg>
                    </div>


                    <form class="w-full max-w-xl rounded-lg px-4 pt-2" id="ratingform" method="POST"
                        enctype="multipart/form-data">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new Reviews</h2>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea
                                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                    name="rating" placeholder='Type Your Comment' required></textarea>
                            </div>
                            <div class="w-full md:w-full flex items-start md:w-full px-3">
                                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-xs md:text-sm pt-px">Share Some Positive comment.</p>
                                </div>
                                <div class="-mr-1">
                                    <input type='submit'
                                        class="rating-submit-btn bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 tracking-wide mr-1 hover:bg-gray-100"
                                        value='Post Review'>
                                </div>
                            </div>
                    </form>
                </div>
            @endauth


        </div>

    </div>
</div>
</div>

<script>
    const svgs = document.querySelector('.rating').children;
    for (let i = 0; i < svgs.length; i++) {
        svgs[i].onclick = () => {
            for (let j = 0; j <= i; j++) {
                svgs[j].classList.add(
                    "fill-yellow-500"); // this class should be added to whitelist while in production mode
            }
            for (let k = i + 1; k < svgs.length; k++) {

                svgs[k].classList.remove(
                    "fill-yellow-500"); // this class should be added to whitelist while in production mode
            }
        }
    }
    var svgId;
    $(document).ready(function() {

        $('svg.cursor-pointer').click(function(e) {
                e.preventDefault();
                svgId = $(this).attr('id');
                console.log(svgId);
            });

        $('.rating-submit-btn').click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#ratingform')[0]);
            console.log('hh', svgId);
            formData.append('svgId', svgId);
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            // $.ajax({

            //     type: 'POST',
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     success: function(response) {
            //         console.log(response);
            //         window.location.href = "{{ route('ourservices') }}";
            //     },
            //     error: function(error) {
            //         console.log(error.responseText);
            //     }
            // });
        });
    });
</script>
