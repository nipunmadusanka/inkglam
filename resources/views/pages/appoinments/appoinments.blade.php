<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div class="p-4 flex flex-col">
            <div class="text-start mb-12">
                <h1 class="text-start text-lg font-bold text-white">
                    Appoinments
                </h1>
            </div>
            <div class="p-10">
                <table class="border-collapse w-full">
                    <thead>
                        <tr>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Employee</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Customer Name</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Email</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Phone Number</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Date</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Message</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Status</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Actions</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                More</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($result as $item)
                            <tr
                                class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">

                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                                    <a href={{ Route('viewemployeinfo', ['id' => $item->eId]) }} class=" text-blue-600">
                                        {{ $item->employe->fname . ' ' . $item->employe->lname }}
                                    </a>
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                                    {{ $item->name }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Email</span>
                                    {{ $item->email }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">phone
                                        number</span>
                                    {{ $item->phone }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Date</span>
                                    {{ $item->date }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Message</span>
                                    {{ $item->message }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                    @if ($item->status == 0)
                                        <span class="rounded bg-blue-400 py-1 px-3 text-xs font-bold">Pending</span>
                                    @elseif ($item->status == 1)
                                        <span class="rounded bg-violet-500 py-1 px-3 text-xs font-bold">Confirm</span>
                                    @elseif ($item->status == 2)
                                        <span class="rounded bg-yellow-400 py-1 px-3 text-xs font-bold">Rejected</span>
                                    @elseif ($item->status == 3)
                                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">Completed</span>
                                    @endif
                                </td>

                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>

                                    <div class="flex flex-row justify-center space-x-2">
                                        <input type="text" class="myId" hidden value='{{ $item->id }}' />
                                        @if ($item->status == 0)
                                            <button type="submit"
                                                class=" bg-violet-500 p-2 border-1 rounded-lg min-w-24 confirm">Confirm</button>
                                            <button type="submit"
                                                class=" bg-red-500 p-2 border-1 rounded-lg min-w-24 rejected">Rejected</button>
                                        @elseif ($item->status == 2)
                                            <span class="text-xs font-bold">Rejected</span>
                                        @elseif ($item->status == 1)
                                            <button type="submit"
                                                class=" bg-red-500 p-2 border-1 rounded-lg min-w-24 rejected">Rejected</button>
                                            <button type="submit"
                                                class=" bg-green-500 p-2 border-1 rounded-lg min-w-24 completed">Completed</button>
                                        @elseif ($item->status == 3)
                                            <span class="text-xs font-bold">Completed</span>
                                        @endif
                                    </div>
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>

                                    <div class="flex flex-row justify-center space-x-2"> <a
                                            href={{ Route('page.editemployee', ['id' => $item->id]) }} class="">
                                            <p class=" text-blue-600 ">View</p>
                                        </a>
                                    </div>
                                </td>
                                <?php $count++; ?>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</x-app-layout>


<script>
    $(document).ready(function() {
        $('.rejected').click(function(e) {
            e.preventDefault();
            var rejectId = $(this).siblings('.myId').val();
            if (rejectId) {
                $.ajax({
                    url: '{{ route('appoinmentreject') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        rejectId: rejectId,
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
                        var response = JSON.parse(error.responseText);
                    }
                });
            } else {
                console.log('Please Click Deactive Button, If You Want to Deactive this Service');
            }
        });

        $('.completed').click(function(e) {
            e.preventDefault();
            var completedId = $(this).siblings('.myId').val();
            if (completedId) {
                $.ajax({
                    url: '{{ route('appoinmentaccept') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        completedId: completedId,
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
                        var response = JSON.parse(error.responseText);
                    }
                });
            } else {
                console.log('Please Click Active Button, If You Want to Active this Service');
            }
        });

        $('.confirm').click(function(e) {
            e.preventDefault();
            var confirmdId = $(this).siblings('.myId').val();
            if (confirmdId) {
                $.ajax({
                    url: '{{ route('appoinmentconfirm') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        confirmdId: confirmdId,
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
                        var response = JSON.parse(error.responseText);
                    }
                });
            } else {
                console.log('Please Click Active Button, If You Want to Active this Service');
            }
        });
    });
</script>
