@extends('pages.website.layouts.webapp')

@section('webcontent')
    <style>
        @layer utilities {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>

    <body>
        <div class="h-auto bg-[#343232] pt-20 pb-10">
            <div class="flex justify-center text-center pb-5">
                <h1 class="text-center text-4xl font-bold text-amber-500">Cart Items</h1>
            </div>
            <div class=" mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="rounded-lg md:w-2/3">
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <img src={{ asset('sellitems/' . $details['image']) }} alt="product-image"
                                    class="w-full rounded-lg sm:w-40" />
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                    <div class="mt-5 sm:mt-0">
                                        <h2 class="text-lg font-bold text-gray-900">{{ $details['name'] }}</h2>
                                        <p class="mt-1 text-xs text-gray-700">{{ $details['name'] }}</p>
                                        {{ $details['quantity'] }}
                                    </div>
                                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                        <div class="flex items-center border-gray-100">
                                            <div>
                                                <a href={{ Route('reducecart', ['id' => $id]) }}>
                                                    <span
                                                        class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                        - </span>
                                                </a>
                                            </div>

                                            <div
                                                class="h-8 w-8 border bg-white flex justify-center items-center text-center text-xs outline-none">
                                                <p>{{ $details['quantity'] }}</p>
                                            </div>
                                            <div>
                                                <a href={{ Route('addcart', ['id' => $id]) }}>
                                                    <span
                                                        class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                        + </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <p class="text-sm">Rs. {{ $details['price'] }}</p>
                                            <input type="text" class="myId" hidden value={{ $id }} />
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500 deletecart">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Sub total -->
                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">Subtotal</p>
                        <p class="text-gray-700">Rs. {{ session('subtotal', 0) - 270 }}
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-700">Shipping</p>
                        <p class="text-gray-700">Rs. 250</p>
                    </div>
                    <hr class="my-4" />
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total</p>
                        <div class="">
                            <p class="mb-1 text-lg font-bold">Rs. {{ session('subtotal') }}</p>
                            <p class="text-sm text-gray-700">including VAT</p>
                        </div>
                    </div>
                    <a href="{{ Route('pages.viewpayment') }}">
                        <button
                            class="mt-6 w-full rounded-md bg-amber-500 py-1.5 font-medium text-blue-50 hover:bg-amber-600">Check
                            out</button>
                    </a>
                </div>
            </div>
        </div>

    </body>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.deletecart').click(function(e) {
            e.preventDefault();
            var deleteId = $(this).siblings('.myId').val();
            console.log(deleteId);
            if (deleteId) {
                $.ajax({
                    url: '{{ route('deleteCart') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        deleteId: deleteId,
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
    });
</script>
