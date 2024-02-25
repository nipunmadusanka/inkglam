<x-app-layout>

    <div class="flex h-screen  items-center justify-center  mt-15 mb-15">
        <div class="grid rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">
            {{-- <div class="flex justify-center py-4">
            <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
          </div> --}}

            <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-white font-bold md:text-2xl text-xl">Add Employee</h1>
                </div>
            </div>
            <form action={{ Route('addnewemployee') }} method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">First Name</label>
                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="text" name="fname" placeholder="First Name" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Last name</label>
                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="text" name="lname" placeholder="Last Name" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Email</label>
                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="email" name="email" placeholder="Email" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Position</label>
                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="text" name="position" placeholder="Position" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Address</label>
                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="text" name="address" placeholder="Address" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-white text-light font-semibold">Phone Number</label>
                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="text" name="phone" placeholder="Phone Number" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-white text-light font-semibold mb-1">Employee
                        Photo</label>
                    <div class='flex justify-start w-full'>
                        <input type='file' class="" name="image" />
                    </div>
                </div>


                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    {{-- <button
                        class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button> --}}
                    <button type="submit"
                        class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
