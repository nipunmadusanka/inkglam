<x-app-layout>
    @if (Auth::user()->user_type == 0)
        <div class="flex h-auto  items-center justify-center  mt-15 mb-15">
            <div class="grid rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
                {{-- <div class="flex justify-center py-4">
            <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
          </div> --}}

                <div class="flex justify-center">
                    <div class="flex">
                        <h1 class="text-white font-bold md:text-2xl text-xl">Edit Service</h1>
                    </div>
                </div>
                <form action={{ Route('updateservice', ['id' => $result->id]) }} method="POST"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}

                    @method('put')

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">name</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            type="text" name="name" value={{ $result->name }} placeholder={{ $result->name }}/>
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <span id="nameError" class="text-red-500 text-xs"></span>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-white text-light font-semibold">Description</label>
                        <textarea
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="description" placeholder="{{ $result->description }}" value={{ $result->description }}>{{ $result->description }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                        <span id="descriptionError" class="text-red-500 text-xs"></span>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">price</label>
                        <input
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            type="text" name="price" value={{ $result->price }} />
                        @error('price')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-white text-light font-semibold mb-1">Upload
                            Photo</label>
                        <div class='flex justify-start w-full flex-col'>
                            {{-- <label
                            class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p
                                    class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                    Select a photo</p>
                            </div>

                        </label> --}}
                            <img src="{{ asset('images/' . $result->image) }}" alt="image" class="w-16 mb-2" />
                            <input type='file' class="image_validate" name="image" value={{ $result->image }}
                                id="updatedImage" />

                            @error('image')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                            <span id="imageError" class=" text-red-500 text-xs"></span>
                        </div>
                    </div>

                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        {{-- <button
                        class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button> --}}
                        <button type="submit"
                            class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Update</button>
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
