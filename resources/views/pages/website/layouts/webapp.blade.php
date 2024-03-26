<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Agregar estilos para la vista de dispositivos pequeños */
        @media (max-width: 768px) {
            .flex-wrap {
                display: flex;
                flex-wrap: wrap;
            }

            .section-small {
                width: 50%;
            }
        }

        #menu-toggle:checked+#menu {
            display: block;
        }
    </style>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-black">
        @include('pages.website.layouts.navbar')
        <div class="flex flex-col h-screen">

            <!-- Page Heading -->
            {{-- @if (isset($header))
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif --}}

            <!-- Page Content -->
            <div class="flex-1 bg-black">
                @if ($message = Session::get('success'))
                    {{-- <div class="w-full fixed px-4 py-3 text-sm border rounded border-emerald-100 bg-emerald-50 text-emerald-500 z-50"
                        role="alert">
                        <p> {{ $message }}</p>
                    </div> --}}
                    <div class="flex justify-center items-center relative mt-10">
                        <div class="flex fixed bg-yellow-100 rounded-lg p-4 mb-4 text-sm text-yellow-700 z-50"
                            role="alert">
                            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <span class="font-medium"></span> {{ $message }}
                            </div>
                            <div class="flex w-16 justify-end items-end text-right cross">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500 deletecart text-right">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif

                @auth

                    <div class="relative">
                        <a class="" href="{{ route('viewmyChat', ['id' => 1]) }}">
                            <button
                                class="z-20 text-white flex flex-col shrink-0 grow-0 justify-around
                                    fixed bottom-0 right-0 right-5 rounded-lg
                                    mr-1 mb-5 lg:mr-5 lg:mb-5 xl:mr-10 xl:mb-10">
                                <div class="p-3 rounded-full border-4 border-white bg-amber-600">
                                    <svg class="w-5 h-5 lg:w-8 lg:h-8 xl:w-10 xl:h-10" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>

                            </button>
                        </a>
                    </div>
                @endauth

                <main>
                    {{-- {{ $slot }} --}}
                    @yield('webcontent')
                    @include('pages.website.layouts.footer')
                </main>
            </div>
        </div>

    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        $('.cross').click(function(e) {
            window.location.reload();
        });
    });
</script>
