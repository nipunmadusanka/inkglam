@if (Auth::user()->user_type == 0)
    <div class="p-4 flex flex-col">
        <div class=" flex bg-slate-300 p-4">
            <a href={{ route('pages.addproduct', ['mId' => $result->id]) }}
                class="middle none center mr-3 rounded-lg bg-sky-600 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-sky-500/20 transition-all hover:shadow-lg hover:shadow-sky-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                data-ripple-light="true">
                Add Sub Service
            </a>
        </div>
        <div class="p-10">
            <table class="border-collapse w-full">
                <thead>
                    <tr>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Service Name</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Price</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            Image</th>
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
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company
                                    name</span>
                                {{ $item->Product->name }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                                {{ $item->Product->price }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Image</span>
                                <div class="flex flex-row items-center justify-center">
                                    <img src="{{ asset('images/' . $item->Product->image) }}" alt="image" class="w-16" />
                                </div>
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                @if ($item->Product->status == 1)
                                    <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">active</span>
                                @elseif ($item->Product->status == 0)
                                    <span class="rounded bg-yellow-400 py-1 px-3 text-xs font-bold">deactive</span>
                                @endif
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>

                                <div class="flex flex-row justify-center space-x-2"> <a
                                        href={{ Route('page.editservice', ['id' => $item->Product->id]) }} class="">
                                        <button
                                            class=" bg-sky-500 p-2 border-1 rounded-lg px-4 min-w-24">Edit</button></a>
                                    {{-- <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a> --}}
                                    {{-- <form method="POST"
                                        action="{{ route('services.destroy', ['item' => $item->id]) }}">
                                        @csrf
                                        @method('POST') --}}
                                    <input type="text" class="myId" hidden value='{{ $item->Product->id }}' />
                                    @if ($item->Product->status == 1)
                                        <button type="submit"
                                            class=" bg-red-500 p-2 border-1 rounded-lg min-w-24 deactive">Deactivate</button>
                                    @elseif ($item->Product->status == 0)
                                        <button type="submit"
                                            class=" bg-yellow-400 p-2 border-1 rounded-lg min-w-24 active">Activate</button>
                                    @endif

                                    {{-- </form> --}}
                                </div>

                            </td>
                            <?php $count++; ?>
                        </tr>
                    @endforeach
                    {{-- <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                            KnobHome
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                            German
                        </td>
                          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                            <span class="rounded bg-red-400 py-1 px-3 text-xs font-bold">deleted</span>
                          </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                            <a href="#" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                            <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
                        </td>
                    </tr>
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                            Squary
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                            Schweden
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                            <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">active</span>
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                            <a href="#" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                            <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
                        </td>
                    </tr>
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                            ghome
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                            Switzerland
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                            <span class="rounded bg-yellow-400 py-1 px-3 text-xs font-bold">inactive</span>
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                            <a href="#" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                            <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
                        </td>
                    </tr> --}}
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
                    url: '{{ route('services.destroy') }}',
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
                    url: '{{ route('services.active') }}',
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
