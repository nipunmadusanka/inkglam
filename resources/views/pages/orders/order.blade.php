<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div class="p-4 flex flex-col">
            <div class="text-start mb-12">
                <h1 class="text-start text-lg font-bold text-white">
                    All Orders
                </h1>
            </div>
            <div class="flex bg-slate-300 p-4">
                <a href={{ Route('pages.viewMainItemCategory') }}
                    class="middle none center mr-3 rounded-lg bg-sky-600 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-sky-500/20 transition-all hover:shadow-lg hover:shadow-sky-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true">
                    View Main Category
                </a>
                <a href={{ Route('pages.ordersadmin') }}
                    class="middle none center mr-3 rounded-lg bg-sky-600 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-sky-500/20 transition-all hover:shadow-lg hover:shadow-sky-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true">
                    <div class="flex">Orders &nbsp; <p class=" text-amber-400">( {{$count}} )</p></div>
                </a>
            </div>
            <div class="p-10">
                <table class="border-collapse w-full">
                    <thead>
                        <tr>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                ID</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Payment Id</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                User Info Id</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Total</th>
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
                        @foreach ($result as $item)
                            <tr
                                class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Id</span>
                                    {{ $item->id }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">
                                        Payment Id</span>
                                    {{ $item->payInfoId }}
                                </td>
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
