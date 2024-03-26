<?php
$sId = request('sId');
$emId = request('emId');
?>
@php
    $storedData = session('stored_data');
@endphp
<div class="pt-40 h-screen flex justify-center w-full p-5 bg-[#B2B2B2]">
    <div class="container flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 order-2">
            <div class="items-center justify-center pt-5 pb-5 md:order-1 order-2 px-12 bg-neutral-400 border-2">
                @if ($storedData)
                    <div
                        class="justify-center grid-rows-2 top-0 p-3  ">
                        @foreach ($storedData as $id => $data)
                            <div
                                class="grid grid-cols-1 overflow-hidden md:grid-cols-6 gap-2 bg-white text-black mb-4 py-4 p-4 rounded-md shadow-2xl border-2 border-black">
                                <div class="col-span-3 flex-col space-y-2">
                                    <div class="flex">
                                        <p class=" text-lg font-bold">{{ $data['name'] }}</p>
                                    </div>
                                    <p>Price: {{ $data['price'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class='items-center justify-center pt-5 pb-5 md:order-2 order-1 bg-neutral-400 border-2'>
                <div id="alertDiv"
                    class="w-auto px-4 py-3 m-5 text-sm border rounded border-emerald-500 bg-emerald-50 text-emerald-500"
                    role="alert" style="display: none;">
                    <p id="alertP">Service is empty. Please Add Service.</p>
                </div>
                {{-- <h1>sId: {{ $sId }}</h1>
                <h1>emId: {{ $emId }}</h1> --}}
                <form action="{{ Route('placeappoinment') }} " method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-3 gap-0">
                        <input type="hidden" name="sId" value="{{ $sId }}" />
                        <input type="hidden" name="emId" value="{{ $emId }}" />
                        <div class="grid-rows-3 top-0 p-3 md:order-1">
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-black text-light font-semibold">
                                    Name
                                </label>
                                <input
                                    class="py-2 px-3 rounded-lg border-2 border-orange-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text" name="name" placeholder="Name"
                                    value="{{ Auth::check() ? Auth::user()->name : 'Name' }}" />
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-black text-light font-semibold">Phone
                                    Number
                                </label>
                                <input
                                    class="py-2 px-3 rounded-lg border-2 border-orange-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text" name="phone" placeholder="0712345678" />
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label
                                    class="uppercase md:text-sm text-xs text-black text-light font-semibold">Email</label>
                                <input
                                    class="py-2 px-3 rounded-lg border-2 border-orange-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="email" name="email" placeholder="Email"
                                    value="{{ Auth::check() ? Auth::user()->email : 'Email' }}" />
                            </div>
                        </div>

                        <div class="grid-rows-2 top-0 p-3 md:order-1">
                            {{-- <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-black text-light font-semibold">Select
                                    Time Slot</label>
                                <select id="time" name="time"
                                    class="flex-1 py-2 border-b-2 border-orange-900
                                    focus:ring-purple-600 focus:border-transparent placeholder-gray-400 outline-none">
                                    <option value='1' class="py-2" selected>Select Time</option>
                                    @foreach ($timeSlots as $time)
                                        <option value='{{ $time->id }}' class="py-2">{{ $time->start_Time }} -
                                            {{ $time->end_Time }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-black text-light font-semibold">Pick
                                    Date
                                </label>
                                <input
                                    class="py-2 px-3 rounded-lg border-2 border-orange-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="date" name="date" placeholder="Date" />
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label
                                    class="uppercase md:text-sm text-xs text-black text-light font-semibold">Message</label>
                                <textarea
                                    class="py-2 px-3 rounded-lg border-2 border-orange-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="message" id="message" placeholder='Type Your Message' required></textarea>
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <button onclick="validateAndSubmit()" type="submit"
                                    class=' md:w-30 lg:w-58 w-auto bg-amber-600 hover:bg-opacity-70 shadow-xl font-medium text-white px-4 py-2'>
                                    Place Appointment
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateAndSubmit() {
        if (validateForm()) {
            // If validation passes, submit the form
            document.forms[0].submit();
        }
    }

    function validateForm() {
        var name = document.forms[0]["name"].value;
        var phone = document.forms[0]["phone"].value;
        var email = document.forms[0]["email"].value;
        // var time = document.forms[0]["time"].value;
        var date = document.forms[0]["date"].value;
        var message = document.forms[0]["message"].value;

        // Email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $('#alertDiv').show();
            $('#alertP').text('Please enter a valid email address');
            setTimeout(function() {
                $('#alertDiv').hide();
            }, 2000);
            return false;
        }

        // Date validation
        var isValidDate = isValidDateFormat(date);
        if (!isValidDate) {
            $('#alertDiv').show();
            $('#alertP').text('Please enter a valid date');
            setTimeout(function() {
                $('#alertDiv').hide();
            }, 2000);
            return false;
        }

        // Name validation
        if (name.length < 2) {
            $('#alertDiv').show();
            $('#alertP').text('Name must have at least 2 characters');
            setTimeout(function() {
                $('#alertDiv').hide();
            }, 2000);
            return false;
        }

        // Phone number validation
        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phone)) {
            $('#alertDiv').show();
            $('#alertP').text('Phone number must have exactly 10 digits');
            setTimeout(function() {
                $('#alertDiv').hide();
            }, 2000);
            return false;
        }

        // Message validation
        if (message.length < 2) {
            $('#alertDiv').show();
            $('#alertP').text('Message must have at least 2 characters');
            setTimeout(function() {
                $('#alertDiv').hide();
            }, 2000);
            return false;
        }

        // if (time == "1") {
        //     alert("Please select a valid time");
        //     return false;
        // }
    }

    function isValidDateFormat(inputDate) {
        var regexDate = /^\d{4}-\d{2}-\d{2}$/;
        if (!regexDate.test(inputDate)) {
            return false;
        }

        // Check if it's a valid date using the Date object
        var dateObject = new Date(inputDate);
        return !isNaN(dateObject.getTime());
    }
</script>
