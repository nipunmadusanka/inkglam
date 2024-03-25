@if (Auth::user()->user_type == 0 || Auth::user()->user_type == 2)
    <div class="p-4 flex flex-col">

        <div class="p-10">
            <table class="border-collapse w-full">
                <thead>
                    <tr>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            ID</th>
                        @if (Auth::user()->user_type == 0)
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Pay Info Id</th>
                        @endif
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            User Info Id</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Total</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Date</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Status</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach ($user_order as $item)
                        <tr
                            class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Id</span>
                                {{ $item->id }}
                            </td>
                            @if (Auth::user()->user_type == 0)
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">
                                        Payment Id</span>
                                    {{ $item->payInfoId }}
                                </td>
                            @endif
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">
                                    User Info Id</span>
                                {{ $item->uInfoId }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">
                                    Total</span>
                                {{ $item->total }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">
                                    Total</span>
                                {{ $item->created_at }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                @if ($item->status == 1)
                                    <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">active</span>
                                @elseif ($item->status == 0)
                                    <span class="rounded bg-yellow-400 py-1 px-3 text-xs font-bold">deactive</span>
                                @endif
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>

                                @if (Auth::user()->user_type == 0)
                                    <div class="flex flex-row justify-center space-x-2">
                                        <input type="text" class="myId" hidden value='{{ $item->id }}' />
                                        @if ($item->notes != 'read')
                                            <button type="submit"
                                                class=" bg-yellow-400 p-2 border-1 rounded-lg min-w-24 read">Read</button>
                                        @else
                                            <a href={{ Route('pages.viewItems', ['id' => $item->id]) }} class="">
                                                <button
                                                    class=" bg-green-500 p-2 border-1 rounded-lg px-4 min-w-24">View</button>
                                            </a>
                                        @endif
                                    </div>
                                @elseif (Auth::user()->user_type == 2)
                                    @if ($item->notes == 'read')
                                        <a href={{ Route('pages.viewItems', ['id' => $item->id]) }} class="">
                                            <p t class=" text-green-600">Read</p>
                                        </a>
                                    @else
                                        <a href={{ Route('pages.viewItems', ['id' => $item->id]) }} class="">
                                            <button class=" text-blue-600">Pending</button>
                                        </a>
                                    @endif
                                @endif
                            </td>
                            <?php $count++; ?>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif



<script>
    $(document).ready(function() {
        $('.read').click(function(e) {
            e.preventDefault();
            var orderId = $(this).siblings('.myId').val();
            if (orderId) {
                $.ajax({
                    url: '{{ route('readorder') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        orderId: orderId,
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
                console.log('Please Click Deactive Button, If You Want to Deactive this Main Item');
            }
        });
    });
</script>
