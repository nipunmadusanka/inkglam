@php
    $storedData = session('stored_data');
@endphp
<div class="pt-40 min-h-screen flex justify-center w-full h-full p-5 bg-[#343232] text-white">
    <div class="container flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if ($storedData)
                <div
                    class="justify-center grid-rows-2 top-0 p-3 md:order-1 order-1 overflow-y-scroll bg-orange-300 rounded-sm">
                    @foreach ($storedData as $id => $data)
                        <div
                            class="grid grid-cols-1 overflow-hidden md:grid-cols-6 gap-2 bg-white text-black mb-4 py-4 p-4 rounded-md shadow-2xl border-2 border-black">
                            <div class="col-span-3 flex-col space-y-2">
                                <div class="flex">
                                    <p class=" text-lg font-bold">{{ $data['name'] }}</p>
                                </div>
                                <p>Price: {{ $data['price'] }}</p>
                                <hr />
                                @if ($data['emId'] > 0)
                                    @foreach ($employeesWithServices as $employee)
                                        @if ($employee->id == $data['emId'])
                                            <p>Beautician: {{ $employee->fname }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p class=" text-red-500 text-sm font-serif font-thin">Please select beautician</p>
                                @endif

                                @if ($data['tId'] > 0)
                                    @foreach ($timeSlots as $time)
                                        @if ($time->id == $data['tId'])
                                            <p>Time: {{ $time->start_Time }} - {{ $time->end_Time }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p class=" text-red-500 text-sm font-serif font-thin">Please select time-slot</p>
                                @endif
                            </div>
                            <div class="flex justify-center space-x-1 col-span-3 items-center">
                                <input type="text" hidden class="mysId" value={{ $id }}>
                                <button type=""
                                    class="delete_service_btn bg-red-500 rounded-md p-3 px-3 sm:px-4 dark:bg-opacity-60 hover:bg-opacity-90">Delete</button>
                                <button type=""
                                    class="view_service_btn bg-amber-500 rounded-md p-3 px-3 sm:px-4 dark:bg-opacity-60 hover:bg-opacity-90">View</button>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="justify-center grid-rows-2 top-0 p-3 md:order-2 order-2">
                <div class="flex justify-center items-center p-3 top-0">
                    <img class="h-full w-full m-2" src="{{ asset('images/' . $serviceData->image) }}" alt="">
                </div>
            </div>
            <div class="flex justify-center top-0 p-3 md:order-3 order-3">
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
                                    <div class="flex flex-col space-y-4 mb-7">
                                        <div class="grid items-start grid-cols-3 gap-2">
                                            <label for="number"
                                                class="col-span-1 inline-block text-start font-bold pr-5">Select
                                                Beautician</label>
                                            <select id="locationSelect" name="employeId"
                                                class="col-span-2 flex-1 py-2 border-b-2 border-gray-400
                                                focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none">
                                                <option class="emId">
                                                    Select</option>
                                                @foreach ($employeesWithServices as $employee)
                                                    <option value={{ $employee->id }} class="emId">
                                                        {{ $employee->fname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="grid items-start grid-cols-3 gap-2">
                                            <label for="number"
                                                class="col-span-1 inline-block text-start font-bold pr-5">Select
                                                Time Slot</label>
                                            <select id="timeSelect" name="timeId"
                                                class="col-span-2 flex-1 py-2 border-b-2 border-gray-400
                                                focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none">
                                                <option class="emId">
                                                    Select</option>
                                                @foreach ($timeSlots as $time)
                                                    <option value='{{ $time->id }}' class="emId">
                                                        {{ $time->start_Time }} - {{ $time->end_Time }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
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

        $('.view_service_btn').click(function(e) {
            e.preventDefault();
            // var deActiveId = $(this).siblings('.myId').val();
            var sId = $(this).siblings('.mysId').val();
            console.log(sId);
            var url = `/appointment/${sId}`;
            if (sId) {
                window.location.href = url;
            }
        });

        $('.delete_service_btn').click(function(e) {
            var sId = $(this).siblings('.mysId').val();
            console.log("nowSid");
            if (sId) {
                $.ajax({
                    url: '{{ route('deleteselectservice') }}',
                    type: "POST",
                    data: JSON.stringify({
                        deActiveId: sId,
                    }),
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    }
                })
            }
        });

        $('#locationSelect').change(function() {
            var selectedValue = $(this).val();
            console.log(selectedValue);
            var currentUrl = window.location.href;
            var id = currentUrl.substring(currentUrl.lastIndexOf('/') + 1);
            console.log(id);
            if (selectedValue) {
                $.ajax({
                    url: '{{ route('addemtoservice') }}',
                    type: "POST",
                    data: JSON.stringify({
                        sId: id,
                        selectedEmId: selectedValue,
                    }),
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // console.log(response);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    }
                })
            }
        });

        $('#timeSelect').change(function() {
            var timeId = $(this).val();
            console.log(timeId);
            var currentUrl = window.location.href;
            var id = currentUrl.substring(currentUrl.lastIndexOf('/') + 1);
            console.log(id);
            if (timeId) {
                $.ajax({
                    url: '{{ route('addtimetoservice') }}',
                    type: "POST",
                    data: JSON.stringify({
                        sId: id,
                        tId: timeId,
                    }),
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // console.log(response);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    }
                })
            }
        });

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
                    // Assuming response is an object with keys 'sId' and 'emId'

                    if (response == 0) {
                        var redirectLoginUrl = "/login";
                        window.location.href = redirectLoginUrl;
                    } else {
                        var sId = response.sId;
                        var emId = response.emId;
                        // Build the URL with the provided route and parameters
                        var redirectUrl = "/placeappoinmentview?sId=" + sId + "&emId=" +
                            emId;
                        // Redirect the user to the specified route
                        window.location.href = redirectUrl;
                    }

                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        });
    });
</script>
