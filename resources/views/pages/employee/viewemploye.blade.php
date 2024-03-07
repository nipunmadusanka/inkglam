<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div class="justify-center w-full h-auto bg-slate-400  p-5 mb-5">
            <div class="container flex items-center justify-center">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-1">
                    <div class="justify-center grid-rows-2 top-0 p-3">
                        <div class="flex justify-start items-start p-3 top-0">
                            <img class="h-full w-full m-2" src="{{ asset('employeePhotos/' . $result->image) }}"
                                alt="">
                        </div>
                    </div>
                    <div class="flex justify-start top-0 p-3">
                        <div class="flex flex-col justify-start space-y-16 text-start p-3 top-0">
                            <div class="flex-col space-y-2">
                                <p class="font-serif font-bold text-2xl text-white">
                                    {{ $result->fname . ' ' . $result->lname }}
                                </p>
                                <div class="flex">
                                    <p class="font-serif text-lg">
                                        Email : {{ '  ' . $result->email }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="font-serif text-lg">
                                        Position : {{ '  ' . $result->position }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="font-serif text-lg">
                                        Address : {{ '  ' . $result->address }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="font-serif text-lg">
                                        Phone : {{ '  ' . $result->phone }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="font-serif text-lg flex">
                                        Active :
                                        @if ($result->status == 1)
                                            Yes
                                        @elseif ($result->status == 0)
                                            No
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start top-0 p-3">
                        <div class="flex flex-col justify-start space-y-16 text-start p-3 top-0">
                            <div class="flex-col space-y-2">
                                <p class="font-serif font-bold text-2xl underline">
                                    Services
                                </p>
                                <?php $count = 1; ?>
                                @foreach ($employe_has_service as $service)
                                    <div class="flex">
                                        <p class="font-serif text-lg">
                                            {{ $count . ' . ' . $service->product->name }}
                                        </p>
                                    </div>
                                    <?php $count++; ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex item-end justify-end">
                <a href="{{ Route('page.editemployee', ['id' => $result->id]) }}">
                    <p class=" font-serif font-semibold text-lg text-blue-700"> Edit </p>
                </a>
            </div>
        </div>
        @include('pages.employee.employeappoinment')
    @endif
</x-app-layout>
