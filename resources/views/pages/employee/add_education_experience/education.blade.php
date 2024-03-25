<div class="grid grid-cols-1 md:grid-cols-2">
    <div class=" border-r-2 border-black">
        <div class="flex justify-center mt-5 mx-7 bg-indigo-500 p-3 rounded">
            <div class="flex justify-start items-start">
                <h1 class="text-black text-start font-bold md:text-2xl text-xl">Add Education</h1>
            </div>
        </div>
        <div id="alertDiv"
            class="w-auto px-4 py-3 m-5 text-sm border rounded border-emerald-500 bg-emerald-50 text-emerald-500"
            role="alert" style="display: none;">
            <p id="alertP">Comment is empty. Please provide a comment.</p>
        </div>
        <form action={{ Route('addemployeedu', ['id' => $result->id]) }} method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}

            @method('post')

            <div class="grid grid-cols-1 mt-3 mx-7">
                <label class="uppercase md:text-sm text-xs text-white text-light font-semibold"> Education </label>
                <input
                    class="py-1 px-2 border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text" name="education" placeholder="education" />
            </div>
            <div class="grid grid-cols-1 mt-3 mx-7">
                <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Institute</label>
                <input
                    class="py-1 px-2 border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text" name="institute" placeholder="institute" />
            </div>
            <div class="grid grid-cols-1 mt-3 mx-7">
                <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Start Date</label>
                <input
                    class="py-1 px-2 border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text" name="startdate" placeholder="start date" />
            </div>
            <div class="grid grid-cols-1 mt-3 mx-7">
                <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">End Date</label>
                <input
                    class="py-1 px-2 border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text" name="enddate" placeholder="end date" />
            </div>
            <div class="grid grid-cols-1 mt-3 mx-7">
                <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Note</label>
                <input
                    class="py-1 px-2 border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text" name="note" placeholder="note" />
            </div>
            <div class='flex items-satart justify-start  md:gap-8 gap-4 pt-3 pb-3 mt-3 mx-7'>
                {{-- <button
    class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button> --}}
                <button type="submit"
                    class='w-full bg-amber-500 hover:bg-amber-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Add</button>
            </div>
        </form>
    </div>

    <div class="mt-5 mx-7 h-96 overflow-scroll">
        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Education</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Insitute</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Note</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                @foreach ($employe_edu as $em_edu)
                    <tr
                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ID</span>
                            {{ $em_edu->education }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                            {{ $em_edu->Institute }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                            {{ $em_edu->notes }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                            <div class="flex flex-row justify-center space-x-2">
                                <input type="text" class="myIdEdu" hidden value='{{ $em_edu->id }}' />
                                {{-- <input type="text" class="emId" data-emId="{{ $result->id }}" /> --}}
                                @if ($em_edu->status == 1)
                                    <p id="removeedu" class=" removeedu cursor-pointer text-red-600">Remove</p>
                                @elseif ($em_edu->status == 0)
                                    <p id="activeedu" class=" activeedu cursor-pointer text-blue-600">Active</p>
                                @endif

                            </div>
                        </td>
                    </tr>
                    <?php $count++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.removeedu').click(function() {
            var eduId = $(this).siblings('.myIdEdu').val();
            console.log(eduId);
            if (eduId) {
                $('#alertDiv').hide();
                $.ajax({
                    url: '{{ route('removeeducation') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        eduId: eduId
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

        $('.activeedu').click(function() {
            var eduId = $(this).siblings('.myIdEdu').val();
            console.log(eduId);
            if (eduId) {
                $('#alertDiv').hide();
                $.ajax({
                    url: '{{ route('activeeducation') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        eduId: eduId
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
