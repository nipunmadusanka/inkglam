<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div class="flex h-auto items-center justify-center mt-15 mb-15">
            <div class="grid grid-cols-2 gap-2 rounded-lg shadow-xl container">
                {{-- <div class="flex justify-center py-4">
            <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
          </div> --}}
                <div class="">
                    <div class="flex justify-center">
                        <div class="flex">
                            <h1 class="text-white font-bold md:text-2xl text-xl">Edit Employee</h1>
                        </div>
                    </div>
                    <form action={{ Route('updateemployee', ['id' => $result->id]) }} method="POST"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}

                        @method('put')

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">First
                                Name</label>
                            <input
                                class="py-1 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" name="fname" placeholder="First Name" value={{ $result->fname }} />
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Last
                                name</label>
                            <input
                                class="py-1 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" name="lname" placeholder="Last Name" value={{ $result->lname }} />
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label
                                class="uppercase md:text-sm text-xs text-white text-light font-semibold">Email</label>
                            <input
                                class="py-1 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="email" name="email" placeholder="Email" value={{ $result->email }} />
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label
                                class="uppercase md:text-sm text-xs text-white text-light font-semibold">Position</label>
                            <input
                                class="py-1 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" name="position" placeholder="Position" value={{ $result->position }} />
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label
                                class="uppercase md:text-sm text-xs text-white text-light font-semibold">Address</label>
                            <input
                                class="py-1 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" name="address" placeholder="Address" value={{ $result->address }} />
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Phone
                                Number</label>
                            <input
                                class="py-1 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" name="phone" placeholder="Phone Number" value={{ $result->phone }} />
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-white text-light font-semibold mb-1">Upload
                                Photo</label>
                            <div class='flex justify-start w-full flex-col'>
                                <img src="{{ asset('employeePhotos/' . $result->image) }}" alt="image"
                                    class="w-16 mb-2" />
                                <input type='file' class="" name="image" value={{ $result->image }} />
                            </div>
                        </div>

                        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                            {{-- <button
                        class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button> --}}
                            <button type="submit"
                                class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Update</button>
                        </div>
                    </form>
                </div>
                <div class="">
                    <div class="flex justify-center">
                        <div class="flex">
                            <h1 class="text-white font-bold md:text-2xl text-xl">Add Services</h1>
                        </div>
                    </div>
                    <div class="p-10">
                        <div id="alertDiv"
                            class="w-auto px-4 py-3 m-5 text-sm border rounded border-emerald-500 bg-emerald-50 text-emerald-500"
                            role="alert" style="display: none;">
                            <p id="alertP">Comment is empty. Please provide a comment.</p>
                        </div>
                        <div class="flex flex-col space-y-5">
                            <table class="border-collapse w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Index</th>
                                        <th
                                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Name</th>
                                        <th
                                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($service as $service)
                                        <tr
                                            class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                            <td
                                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                                <span
                                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                                                <span
                                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Email</span>
                                                {{ $service->name }}
                                            </td>
                                            <td
                                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                                                <span
                                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                                <div class="flex flex-row justify-center space-x-2">
                                                    <input type="text" class="myId" hidden
                                                        value='{{ $service->id }}' />
                                                    <input type="text" class="emId" hidden
                                                        value='{{ $result->id }}' />
                                                    {{-- <input type="text" class="emId" data-emId="{{ $result->id }}" /> --}}

                                                    <button id="add"
                                                        class=" bg-sky-500 p-2 border-1 rounded-lg px-4 z-30 add">Add</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="flex justify-center">
                                <div class="flex">
                                    <h1 class="text-white font-bold md:text-2xl text-xl">Already Added Services</h1>
                                </div>
                            </div>
                            <table class="border-collapse w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Index</th>
                                        <th
                                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Name</th>
                                        <th
                                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($employee_has_service as $em_service)
                                        <tr
                                            class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                            <td
                                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                                <span
                                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ID</span>
                                                {{ $count }}
                                            </td>
                                            <td
                                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                                                <span
                                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                                                {{ $em_service->product->name }}
                                            <td
                                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                                                <span
                                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                                <div class="flex flex-row justify-center space-x-2">
                                                    <input type="text" class="myIdR" hidden
                                                        value='{{ $em_service->id }}' />
                                                    {{-- <input type="text" class="emId" data-emId="{{ $result->id }}" /> --}}
                                                    <button id="remove" type="submit"
                                                        class=" bg-red-500 p-2 border-1 rounded-lg remove">Remove</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
<script>
    $(document).ready(function() {
        $('.add').click(function(e) {
            e.preventDefault();
            var adddMyId = $(this).siblings('.myId').val();
            var emId = $(this).siblings('.emId').val();
            var dataObj = {
                adddMyId: adddMyId,
                emId: emId,
            };
            // console.log(dataObj);
            if (adddMyId && emId) {
                $('#alertDiv').hide();
                $.ajax({
                    url: '{{ route('addserviceToEmployee') }}',
                    type: 'POST',
                    data: JSON.stringify(dataObj),
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.reload();
                        $('#alertP').text(response.message);
                    },
                    error: function(error) {
                        var response = JSON.parse(error.responseText);
                        $('#alertP').text(response.message);
                    },
                    complete: function(response) {
                        console.log(response);
                        $('#alertDiv').show();
                        setTimeout(function() {
                            $('#alertDiv').hide();
                        }, 10000);
                    }
                });
            } else {
                // Show the hidden div
                $('#alertDiv').show();
                // Change the text inside the <p> element
                $('#alertP').text('Please Click Add Button, If You Want to Add this Service');
                console.log('Please Click Add Button, If You Want to Add this Service');
                setTimeout(function() {
                    $('#alertDiv').hide();
                }, 15000);
            }
        });

        $('.remove').click(function(e) {
            e.preventDefault();
            var removeServiceId = $(this).siblings('.myIdR').val();
            // console.log(removeServiceId);

            if (removeServiceId) {
                $('#alertDiv').hide();
                $.ajax({
                    url: '{{ route('removeemployeeinservice') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        removeServiceId: removeServiceId
                    }),
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.reload();
                        $('#alertP').text(response.message);
                    },
                    error: function(error) {
                        console.log(error.responseText);
                        var response = JSON.parse(error.responseText);
                        $('#alertP').text(response.message);
                    },
                    complete: function() {
                        console.log('successfully removed service');
                        $('#alertDiv').show();
                        $('#alertP').text('successfully removed service');
                        setTimeout(function() {
                            $('#alertDiv').hide();
                        }, 10000);
                    }
                });
            } else {
                // Show the hidden div
                $('#alertDiv').show();
                // Change the text inside the <p> element
                $('#alertP').text('Please Click Remove Button, If You Want to Rmove this Service');
                console.log('Please Click Remove Button, If You Want to Remove this Service');
                setTimeout(function() {
                    $('#alertDiv').hide();
                }, 15000);
            }
        });

    });
</script>
