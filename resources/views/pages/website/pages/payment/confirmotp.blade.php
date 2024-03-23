@extends('pages.website.layouts.webapp')
@section('webcontent')
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <div class="flex flex-col h-screen bg-gradient-to-b from-[#0c1927] to-gray-700">
        <div class="grid place-items-center mx-2 my-20 sm:my-auto" x-data="{ showPass: true }">
            <div
                class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12
               px-6 py-10 sm:px-10 sm:py-6
               bg-white rounded-lg shadow-md lg:shadow-lg">
                <div class="text-center mb-4">
                    <h6 class="font-semibold text-[#063970] text-xl">Please Enter Your OTP</h6>
                    <span class=" text-xs text-[#063970]">Check Your Bank Email</span>
                </div>

                <form action={{ Route('paymentotp') }} method="POST" class="space-y-5" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div>
                        <input id="orderotp" name="orderotp" type="text"
                            class="block w-full py-3 px-3 mt-2
                           text-gray-800 appearance-none
                           border-2 border-gray-800
                           focus:text-gray-500 focus:outline-none rounded-md"
                            placeholder="Type here your OTP" />
                        @error('orderotp')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full py-3 mt-10 bg-amber-500 rounded-md
                       font-medium text-white uppercase
                       focus:outline-none hover:shadow-none">
                        Confirm Payment
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
