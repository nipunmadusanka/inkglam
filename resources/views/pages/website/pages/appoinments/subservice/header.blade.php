<div class="flex justify-center w-full h-full p-5 bg-[#343232] text-white">
    <div class="container items-center justify-center">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-3">
            <div class="justify-center col-span-2 grid-rows-2 top-0 order-1">
                <div class="top-0">

                    @foreach ($subproduct as $subproduct)
                        @if ($subproduct->product->status == 1)
                            <div
                                class="grid grid-cols-1 md:grid-cols-6 gap-2 bg-white text-black mb-4 py-4 p-4 rounded-md">
                                <div class="p-1 col-span-1 overflow-hidden rounded">
                                    <img class="h-24 w-24 object-cover rounded"
                                        src="{{ asset('images/' . $subproduct->product->image) }}" alt="">
                                </div>
                                <div class="col-span-4 flex-col space-y-2">
                                    <div class="flex">
                                        <p class=" text-lg font-bold"> {{ $subproduct->product->name }} </p>
                                    </div>
                                    <p class="">Rs: {{ $subproduct->product->price }} </p>
                                </div>
                                <div class="flex justify-center col-span-1 items-center">
                                    <form class="w-full max-w-xl rounded-lg px-4 pt-2 addsubform"
                                        action="{{ route('addsubservice') }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" class="subId" value="{{ $subproduct->product->id }}"
                                            name="subId">
                                        <input type="text" hidden id="subName"
                                            value="{{ $subproduct->product->name }}" name='name'>
                                        <input type="text" hidden id="subPrice"
                                            value="{{ $subproduct->product->price }}" name='price'>
                                        <button type="submit"
                                            class="add-sub submit-btn bg-amber-500 rounded-md p-3 px-3 sm:px-8 dark:bg-opacity-60 hover:bg-opacity-90">Add</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center col-span-1 top-0 p-3 order-2 bg-[#B2B2B2] rounded-lg">
                <div class="flex flex-col justify-start text-start p-3">
                    <div id="alertDiv"
                        class="w-auto px-4 py-3 m-5 text-sm border rounded border-emerald-500 bg-emerald-50 text-emerald-500"
                        role="alert" style="display: none;">
                        <p id="alertP">Service is empty. Please Add Service.</p>
                    </div>
                    <div class="top-0">
                        <div id="addeditmes" class="p-5 mb-6 text-black text-xl font-bold top-0 flex justify-center">
                            <p class="font-serif text-lg">Added Services:
                                <span class=" font-serif text-lg text-amber-400" id='numberitems'></span>
                            </p>
                        </div>
                        <div class="flex-col space-y-2 main-container">
                            <!-- Existing content here -->
                        </div>
                        <div hidden id="totaldiv" class=" text-lg font-semibold font-serif mt-6 text-black">
                            <p class=" ">Full Amount Rs. <span id="subTotal" class="font-serif"></span> </p>

                        </div>
                    </div>
                    <div class="flex flex-col bottom-0 mt-6">
                        <div class="">
                            <button type=""
                                class="clear_btn submit-btn bg-amber-400 rounded-md p-3 px-3 sm:px-8 w-32 text-black">Clear
                                all</button>
                            <button type=""
                                class="next_btn submit-btn bg-amber-400 rounded-md p-3 px-3 sm:px-8 w-32 text-black">Next</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.addsubform').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the form data for the current form
            var formData = new FormData($(this)[0]);

            // Send the form data via AJAX
            $('#alertDiv').hide();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    var storedData = response.formData;
                    // Get the keys of the storedData object
                    var keys = Object.keys(storedData);
                    // Get the count of items
                    var itemCount = keys.length;
                    $('#numberitems').text(itemCount);
                    console.log(itemCount);
                    const data = response;
                    $('#alertDiv').show();
                    $('#addeditmes').show();
                    $('#totaldiv').show();
                    $('#alertP').text(data);
                    // Initialize sum
                    var sum = 0;
                    // Clear existing content in the main container
                    $('.main-container').empty();
                    // Iterate over each item in storedData object
                    for (var key in storedData) {
                        if (storedData.hasOwnProperty(key)) {
                            var item = storedData[key];

                            // Check if item has 'price' key
                            if (item.hasOwnProperty('price')) {
                                // Add price to sum
                                sum += parseFloat(item.price);
                            }
                            // Create a div element for each item
                            var itemDiv = $(
                                '<div class="flex-col space-y-2 border-y"></div>');
                            // Create paragraph elements with the item's name and price
                            var titleParagraph = $(
                                '<p class="font-serif font-bold text-2xl">' + item
                                .name + '</p>');
                            var priceParagraph = $('<p class="font-serif text-lg">Rs. ' +
                                item.price + '</p>');

                            // Append paragraphs to the itemDiv
                            itemDiv.append(titleParagraph);
                            itemDiv.append(priceParagraph);

                            // Append itemDiv to the main container
                            $('.main-container').append(itemDiv);
                        }
                    }
                    $('#subTotal').text(sum);
                    console.log('Total sum:', sum);
                    // Handle the success response
                    // You can redirect the user or display a success message here
                },
                error: function(xhr, status, error) {
                    // Handle errors
                },
                complete: function(response) {
                    console.log('Your Service was successfully Added', response);
                    $('#alertDiv').show();
                    $('#alertP').text('Your service was successfully added');
                    setTimeout(function() {
                        $('#alertDiv').hide();
                    }, 2000);
                }
            });
        });

        $('.clear_btn').click(function(e) {


            $.ajax({
                url: '{{ route('clearallservices') }}',
                type: 'POST',
                data: null,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    window.location.reload();
                    console.log(response);
                },
                error: function(error) {
                    console.log(error.responseText);
                },
                complete: function() {
                    console.log('succesfully cleared');
                    $('#alertDiv').show();
                    $('#alertP').text('succesfully cleared');
                    setTimeout(function() {
                        $('#alertDiv').hide();
                    }, 10000);
                    // Enable submissions after 2 minutes
                    setTimeout(function() {
                        canSubmit = true;
                    }, 60000); // 1 minutes in milliseconds
                }
            });
        });
    });
</script>

