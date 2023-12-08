<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @yield('style')

    <style>
        .container {
            background-color: black;
            /* Set container background color to black */
            color: white;
            /* Set container text color to white */
        }

        body {
            background-color: black;
            color: white; /* Set text color to white for better visibility on a black background */
        }

        /* Add any additional styling for specific elements or classes as needed */
        header {
            background-color: black;
            /* Set header background color to black if needed */
            color: white;
            /* Set header text color to white if needed */
        }

        footer {
            background-color: black;
            /* Set footer background color to black */
            color: white;
            /* Set footer text color to white */
            text-align: center;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-black-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-black">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <div class="container">
            @yield('content')
        </div>

    </div>

    @stack('modals')

    @livewireScripts

    <footer style="text-align: center">
        <medium>&copy; 2023 Developed by <b>ELEC3C-Group 1.</b> </medium>
    </footer>

</body>

</html>