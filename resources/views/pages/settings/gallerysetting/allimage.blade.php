<div class="flex justify-center items-center w-auto p-3">
    <div class=" container">
        <div class=" grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-3">
            @foreach ($result as $item)
                <div class="group items-center flex justify-center relative hover:bg-[#0D0F1C]/80">
                    <img src="{{ asset('imagegallry/' . $item->image) }}" alt="logo"
                        class="block h-full w-full fill-current text-gray-800 dark:text-gray-200 focus:shadow-outline group-hover:opacity-25" />

                    <!-- Text hidden by default, shown on group hover -->
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 container items-center">
                        <p class="text-center text-white text-lg font-bold">{{ $item->name }}
                        </p>
                        <p class="text-center text-base font-serif font-medium text-white">{{ $item->description }}</p>

                        <div class="flex justify-center">
                            <input type="text" class="myId" hidden value='{{ $item->id }}' />
                            @if ($item->status == 1)
                                <button type="submit"
                                    class=" bg-red-500 p-1 border-1 rounded-lg deactive z-20">Deactivate</button>
                            @elseif ($item->status == 0)
                                <button type="submit"
                                    class=" bg-yellow-400 p-1 border-1 rounded-lg active">Activate</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.deactive').click(function(e) {
            e.preventDefault();
            var deActiveId = $(this).siblings('.myId').val();
            console.log(deActiveId);
            if (deActiveId) {
                $.ajax({
                    url: '{{ route('gallery.deactive') }}',
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
                    url: '{{ route('gallery.active') }}',
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
