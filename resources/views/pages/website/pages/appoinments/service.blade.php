<div class="flex justify-center w-full h-full p-5 bg-slate-100">
    <div class="container flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="justify-center grid-rows-2 top-0 p-3 md:order-1 order-2">
                <div class="flex justify-center items-center p-3 top-0">
                    <img class="h-full w-full m-2" src="{{ asset('images/'. $serviceData->image ) }}" alt="">
                </div>
            </div>
            <div class="flex justify-center top-0 p-3 md:order-2 order-1">
                <div class="flex flex-col justify-start space-y-16 text-start p-3 top-0">
                    <div class="flex-col space-y-2">
                        <p class="font-serif font-bold text-2xl">{{ $serviceData->name }}
                        <p class="font-serif text-lg">Rs. {{ $serviceData->price }}
                            <br>
                            <span class=" italic text-sm"> Inclusive of all taxes</span>
                        </p>
                        </p>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div class="">
                            <form id="appointmentForm" action="{{ route('makeappointment', ['id' => $id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="space-y-2">
                                    <div class="grid grid-cols-2 gap-30">
                                        <div class="flex items-start mb-5">
                                            <label for="number"
                                                class="inline-block w-20 text-start font-bold text-gray-600">Select
                                                Employee</label>
                                            <select id="locationSelect" name="location"
                                                class="flex-1 py-2 border-b-2 border-gray-400
                                                focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none">
                                                <option value="1">Surabaya</option>
                                                <option value="2">Jakarta</option>
                                                <option value="3">Bandung</option>
                                                <option value="4">Tangerang</option>
                                            </select>
                                        </div>
                                        {{-- <div class="grid grid-cols-1 mt-5 mx-7">
                                            <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">price</label>
                                            <input
                                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                type="text" name="price" id="priceid" placeholder="price" />
                                        </div> --}}
                                    </div>
                                    <button type="submit"
                                        class="submit-btn bg-orange-900 p-3 px-4 dark:bg-opacity-60 text-white hover:bg-opacity-90">Make
                                        Appointment</button>
                                </div>
                            </form>
                        </div>
                        <div class="">
                            <p class="text-start font-serif text-lg">
                                {{ $serviceData->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.submit-btn').click(function(e) {
            e.preventDefault();

            var formData = new FormData($('#appointmentForm')[0]);
            console.log(formData);
            $.ajax({
                url: $('#appointmentForm').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = "{{ route('ourservices') }}";
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        });
    });
</script>
