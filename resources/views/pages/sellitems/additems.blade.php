<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div class="flex h-auto  items-center justify-center  mt-15 mb-15">
            <div class="grid rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">

                <div class="flex justify-center">
                    <div class="flex">
                        <h1 class="text-white font-bold md:text-2xl text-xl">Add Items</h1>
                    </div>
                </div>
                <form action={{ Route('additems') }} method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">name</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            type="text" name="item" placeholder="item" value="{{ old('item') }}" />
                        @error('item')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-white text-light font-semibold">description</label>
                        <textarea
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="description" placeholder="description" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-white text-light font-semibold">brand</label>
                        <textarea
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="brand" placeholder="brand" value="{{ old('brand') }}"></textarea>
                        @error('brand')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-white text-light font-semibold">Item Code</label>
                        <textarea
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="item_code" placeholder="item_code" value="{{ old('item_code') }}"></textarea>
                        @error('item_code')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-white text-light font-semibold">Model</label>
                        <textarea
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="model" placeholder="model" value="{{ old('model') }}"></textarea>
                        @error('model')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">price</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            type="text" name="price" placeholder="price" value="{{ old('price') }}" />
                        @error('price')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">QTY</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            type="text" name="qty" placeholder="qty" value="{{ old('qty') }}" />
                        @error('qty')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-white text-light font-semibold mb-1">Upload
                            Photo</label>
                        <div class='flex justify-start w-full'>
                            <input type='file' class="image_validate" name="image" value="{{ old('image') }}"
                                id="updatedImage" />

                            @error('image')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                            <span id="imageError" class=" text-red-500 text-xs"></span>
                        </div>
                    </div>
                    <input type="hidden" name="mId" value="{{ $mId }}" />
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        {{-- <button
                        class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button> --}}
                        <button type="submit"
                            class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</x-app-layout>

<script>
    $(document).ready(function() {
        $('input.image_validate').on('change', function() {
            var image = $(this).val().trim();
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            var maxSize = 1 * 1024 * 1024; // 1 MB

            // Validate file type
            if (!allowedExtensions.exec(image)) {
                $('#imageError').text('Please upload a valid JPG or PNG image');
                return false;
            }

            // Validate file size
            var fileSize = this.files[0].size;
            if (fileSize > maxSize) {
                $('#imageError').text('File size must be less than 1 MB');
                return false;
            }

            // If the image is valid, clear the error message
            $('#imageError').text('');
        });
    });
</script>
