@if (Auth::user()->user_type == 0)
    <div class="p-4 flex flex-col">
        <div class="flex bg-slate-300 p-4">
            <a href={{ route('page.addnewitems', ['id' => $result->id]) }}
                class="middle none center mr-3 rounded-lg bg-sky-600 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-sky-500/20 transition-all hover:shadow-lg hover:shadow-sky-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                data-ripple-light="true">
                Add Items
            </a>
        </div>
        <div class="p-10">
            <table class="border-collapse w-full">
                <thead>
                    <tr>

                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            image</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Item</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Description</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Price</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            QTY</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Created Date</th>
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
                    @foreach ($product as $item)
                        <tr
                            class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Image</span>
                                <div class="flex flex-row items-center justify-center">
                                    <img src="{{ asset('sellitems/' . $item->image) }}" alt="image" class="w-16" />
                                </div>
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Item</span>
                                {{ $item->item }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                                {{ $item->description }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Price</span>
                                {{ $item->price }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">QTY</span>
                                {{ $item->qty }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Created
                                    Date</span>
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

                                <div class="flex flex-row justify-center space-x-2"> <a
                                        href={{ Route('page.edititems', ['id' => $item->id]) }} class="">
                                        <button
                                            class=" bg-sky-500 p-2 border-1 rounded-lg px-4 min-w-24">Edit</button></a>
                                    {{-- <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a> --}}
                                    {{-- <form method="POST"
                                        action="{{ route('services.destroy', ['item' => $item->id]) }}">
                                        @csrf
                                        @method('POST') --}}
                                    <input type="text" class="myId" hidden value='{{ $item->id }}' />
                                    @if ($item->status == 1)
                                        <button type="submit"
                                            class=" bg-red-500 p-2 border-1 rounded-lg min-w-24 deactive">Deactivate</button>
                                    @elseif ($item->status == 0)
                                        <button type="submit"
                                            class=" bg-yellow-400 p-2 border-1 rounded-lg min-w-24 active">Activate</button>
                                    @endif
                                    <a href={{ Route('pages.viewItems', ['id' => $item->id]) }} class="">
                                        <button
                                            class=" bg-green-500 p-2 border-1 rounded-lg px-4 min-w-24">View</button>
                                    </a>

                                    {{-- </form> --}}
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

<script>
    $(document).ready(function() {
        $('.deactive').click(function(e) {
            e.preventDefault();
            var deActiveId = $(this).siblings('.myId').val();
            if (deActiveId) {
                $.ajax({
                    url: '{{ route('deactiveItems') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        deActiveId: deActiveId,
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

        $('.active').click(function(e) {
            e.preventDefault();
            var activeId = $(this).siblings('.myId').val();
            if (activeId) {
                $.ajax({
                    url: '{{ route('activeItems') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        activeId: activeId,
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
