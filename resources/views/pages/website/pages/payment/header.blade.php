<style>
    * {
        margin: 0;
        padding: 0;
    }

    fieldset label span {
        min-width: 125px;
    }

    fieldset .select::after {
        content: '';
        position: absolute;
        width: 9px;
        height: 5px;
        right: 20px;
        top: 50%;
        margin-top: -2px;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='9' height='5' viewBox='0 0 9 5'><title>Arrow</title><path d='M.552 0H8.45c.58 0 .723.359.324.795L5.228 4.672a.97.97 0 0 1-1.454 0L.228.795C-.174.355-.031 0 .552 0z' fill='%23CFD7DF' fill-rule='evenodd'/></svg>");
        pointer-events: none;
    }



    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        /* background-position: right 0.5rem center;
                        background-size: 1.5em 1.5em; */
        -webkit-tap-highlight-color: transparent;
    }

    .submit-button:disabled {
        cursor: not-allowed;
        background-color: #D1D5DB;
        color: #111827;
    }

    .submit-button:disabled:hover {
        background-color: #9CA3AF;
    }

    .credit-card {
        max-width: 420px;
        margin-top: 3rem;
    }

    @media only screen and (max-width: 420px) {
        .credit-card .front {
            font-size: 100%;
            padding: 0 2rem;
            bottom: 2rem !important;
        }

        .credit-card .front .number {
            margin-bottom: 0.5rem !important;
        }
    }
</style>
<div class="flex justify-center items-center p-10 w-full h-auto bg-indigo-50 font-serif pb-15">
    <form id="user-form" method="POST" action="" enctype="multipart/form-data">
        <div class="grid grid-cols-1 gap-1 lg:grid-cols-3">
            <div class="lg:col-span-2 bg-indigo-50 space-y-8 px-12 pb-4">
                <div class="mt-8 p-4 relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md">
                    <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                        <div class="text-yellow-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-5 h-6 sm:h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-sm font-medium ml-3">Checkout</div>
                    </div>
                    <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">Complete your shipping and
                        payment
                        details below.</div>
                    <div
                        class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="rounded-md">

                    <section>
                        <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Shipping & Billing
                            Information</h2>
                        @foreach (session('tem_payment_data', []) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                        <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Name</span>
                                <input name="name" class="focus:outline-none px-3" placeholder="Try Odinsson"
                                    required="" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Phone</span>
                                <input name="phone" type="text" class="focus:outline-none px-3"
                                    placeholder="0712345678" required="" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Email</span>
                                <input name="email" type="email" class="focus:outline-none px-3"
                                    placeholder="try@example.com" required="" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Address</span>
                                <input name="address" class="focus:outline-none px-3" placeholder="10 Street XYZ"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-10 items-center">
                                <span class="text-right px-2">Message</span>
                                <textarea class="focus:outline-none px-3" name="message" id="message" placeholder='Type Your Message'
                                    value="{{ old('message') }}" required></textarea>
                                @error('message')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </label>

                        </fieldset>
                    </section>

                </div>
                <div class="rounded-md">
                    <section>
                        <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Payment Information
                        </h2>
                        <button id="showpayment"
                            class="showpayment submit-button px-4 py-3 rounded-full bg-amber-400 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                            Show
                        </button>
                    </section>
                </div>

            </div>
            <div class="col-span-1 bg-white lg:block">
                <div id="alertDiv"
                    class="w-auto px-4 py-3 m-5 text-sm border rounded border-emerald-500 bg-emerald-50 text-emerald-500"
                    role="alert" style="display: none;">
                    <p id="alertP">Service is empty. Please Add Service.</p>
                </div>
                <h1 class="py-6 border-b-2 text-xl text-gray-600 px-8">Order Summary</h1>
                <ul class="py-6 border-b space-y-6 px-8">
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            <li class="grid grid-cols-6 gap-2 border-b-1">
                                <div class="col-span-1 self-center">
                                    <img src={{ asset('sellitems/' . $details['image']) }} alt="product-image"
                                        class="rounded w-full" />
                                </div>
                                <div class="flex flex-col col-span-3 pt-2">
                                    <span class="text-gray-600 text-md font-semi-bold">{{ $details['name'] }}</span>
                                    <span
                                        class="text-gray-400 text-sm inline-block pt-2">{{ $details['brand'] }}</span>
                                </div>
                                <div class="col-span-2 pt-3">
                                    <div class="flex items-center space-x-2 text-sm justify-between">
                                        <span class="text-gray-400">{{ $details['quantity'] }} &nbsp; &nbsp; x</span>
                                        <span class="text-amber-400 font-semibold inline-block">Rs.
                                            {{ $details['price'] }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="px-8 border-b">
                    <div class="flex justify-between py-4 text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-semibold text-amber-500">Rs. {{ session('subtotal', 0) - 270 }}</span>
                    </div>
                    <div class="flex justify-between py-4 text-gray-600">
                        <span>Shipping</span>
                        <span class="font-semibold text-amber-500">Rs. 250</span>
                    </div>
                </div>
                <div class="font-semibold text-xl px-8 flex justify-between py-8 text-gray-600">
                    <span>Total</span>
                    <div>
                        <span>Rs. {{ session('subtotal') }}</span>
                        <p class=" text-xs text-gray-700">including VAT</p>
                    </div>
                </div>



                <div class="paymentcard" id="paymentcard" hidden>
                    <div class="m-4">
                        <div class="credit-card w-full sm:w-auto shadow-lg mx-auto rounded-xl bg-white"
                            x-data="creditCard">
                            <header class="flex flex-col justify-center items-center">
                                <div class="relative" x-show="card === 'front'"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100">
                                    <img class="w-full h-auto"
                                        src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/svg-cards/card-visa-front.png"
                                        alt="front credit card">
                                    <div
                                        class="front bg-transparent text-lg w-full text-white px-12 absolute left-0 bottom-12">
                                        <p class="number mb-5 sm:text-xl"
                                            x-text="cardNumber !== '' ? cardNumber : '0000 0000 0000 0000'"></p>
                                        <div class="flex flex-row justify-between">
                                            <p x-text="cardholder !== '' ? cardholder : 'Card holder'"></p>
                                            <div class="">
                                                <span x-text="expired.month"></span>
                                                <span x-show="expired.month !== ''">/</span>
                                                <span x-text="expired.year"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative" x-show="card === 'back'"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100">
                                    <img class="w-full h-auto"
                                        src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/svg-cards/card-visa-back.png"
                                        alt="">
                                    <div
                                        class="bg-transparent text-white text-xl w-full flex justify-end absolute bottom-20 px-8  sm:bottom-24 right-0 sm:px-12">
                                        <div class="border border-white w-16 h-9 flex justify-center items-center">
                                            <p x-text="securityCode !== '' ? securityCode : 'code'"></p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="flex">
                                    <li class="mx-2">
                                        <img class="w-16"
                                            src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/computop.png"
                                            alt="" />
                                    </li>
                                    <li class="mx-2">
                                        <img class="w-14"
                                            src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/verified-by-visa.png"
                                            alt="" />
                                    </li>
                                    <li class="ml-5">
                                        <img class="w-7"
                                            src="https://www.computop-paygate.com/Templates/imagesaboutYou_desktop/images/mastercard-id-check.png"
                                            alt="" />
                                    </li>
                                </ul>
                            </header>
                            <main class="mt-4 p-4">
                                <h1 class="text-xl font-semibold text-gray-700 text-center">Card payment</h1>
                                <div class="">
                                    <div class="my-3">
                                        <input type="text" name="cardholder" id="cardholder"
                                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                            placeholder="Card holder" maxlength="22" x-model="cardholder" />
                                    </div>
                                    <div class="my-3">
                                        <input type="text" name="cardnumber" id="cardnumber"
                                            class="block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                            placeholder="Card number" x-model="cardNumber" x-on:keydown="format()"
                                            x-on:keyup="isValid()" maxlength="19" />
                                    </div>
                                    <div class="my-3 flex flex-col">
                                        <div class="mb-2">
                                            <label for="" class="text-gray-700">Expired</label>
                                        </div>
                                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                            <select name="expmonth" id="expmonth"
                                                class="form-select appearance-none block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                                x-model="expired.month">
                                                <option value="" selected disabled>MM</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <select name="expyear" id="expyear"
                                                class="form-select appearance-none block w-full px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                                x-model="expired.year">
                                                <option value="" selected disabled>YY</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>
                                            <input type="text" name="securitycode" id="securitycode"
                                                class="block w-full col-span-2 px-5 py-2 border rounded-lg bg-white shadow-lg placeholder-gray-400 text-gray-700 focus:ring focus:outline-none"
                                                placeholder="Security code" maxlength="3" x-model="securityCode"
                                                x-on:focus="card = 'back'" x-on:blur="card = 'front'" />
                                        </div>
                                    </div>
                                </div>
                            </main>
                            <footer class="mt-6 p-4">
                                <button
                                    class="submit-button px-4 py-3 rounded-full bg-amber-400 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors"
                                    x-bind:disabled="!isValid" x-on:click="onSubmit()">
                                    Pay Rs. {{ session('subtotal') }}
                                </button>
                            </footer>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </form>
</div>


<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("creditCard", () => ({
            init() {
                console.log('Component mounted');
            },
            format() {
                if (this.cardNumber.length > 18) {
                    return;
                }
                this.cardNumber = this.cardNumber.replace(/\W/gi, '');
            },
            get isValid() {
                if (this.cardholder.length < 5) {
                    return false;
                }
                if (this.cardNumber === '') {
                    return false;
                }
                if (this.expired.month === '' && this.expired.year === '') {
                    return false;
                }
                if (this.securityCode.length !== 3) {
                    return false;
                }
                return true;
            },
            onSubmit() {
                alert(`You did it ${this.cardholder}.`);
            },
            cardholder: '',
            cardNumber: '',
            expired: {
                month: '',
                year: '',
            },
            securityCode: '',
            card: 'front',
        }));
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('.showpayment').click(function(e) {
            e.preventDefault();
            $('#paymentcard').slideToggle(); // Toggle the visibility of the div
            var isVisible = $('#paymentcard').is(':visible'); // Check if the div is visible

            if (isVisible) {
                $(this).text('Hide');
            } else {
                $(this).text('Show');
            }
        });

        $('.submit-button').click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#user-form')[0]);
            console.log(formData);

            $.ajax({
                url: '{{ route('payment') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log("uu", response.message);

                    var redirectLoginUrl = "/viewconfirmpaymentotp";
                    window.location.href = redirectLoginUrl;
                },
                error: function(xhr, status, error) {
                    console.log(error.responseText);
                    var jsonResponse = JSON.parse(xhr.responseText);
                    $('#alertDiv').show();
                    $('#alertP').text(jsonResponse.message);
                },
                complete: function() {
                    console.log('successfully submitted')

                }
            });
        });

    });
</script>
