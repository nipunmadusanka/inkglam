<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div class="p-4 flex flex-col">
            <div class="text-start mb-12">
                <h1 class="text-start text-lg font-bold text-white">
                    All Users
                </h1>
            </div>
            <div class="p-10">
                <table class="border-collapse w-full">
                    <thead>
                        <tr>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Id</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Name</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                NIC</th>
                            <th
                                class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                                Email</th>

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
                                    {{ $item->id }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                                    <a href="{{Route('page.userorder', ['id' => $item->id])}}" class=" cursor-pointer text-sky-700 hover:underline"> {{ $item->name }} </a>
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NIC</span>
                                    {{ $item->nic }}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">NIC</span>
                                    {{ $item->email }}
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
