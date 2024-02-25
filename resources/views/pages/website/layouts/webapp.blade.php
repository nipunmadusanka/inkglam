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
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
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
            <div class="flex-1 bg-white dark:bg-gray-700">
                @if ($message = Session::get('success'))
                    <div class="w-full px-4 py-3 text-sm border rounded border-emerald-100 bg-emerald-50 text-emerald-500"
                        role="alert">
                        <p> {{ $message }}</p>
                    </div>
                @endif

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
