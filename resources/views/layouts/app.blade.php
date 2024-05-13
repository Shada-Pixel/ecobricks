<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"/>
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/css/backend.css?v=1.0.0') }}">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">

        @if (isset($headerstyle))
            {{ $headerstyle }}
        @endif

        <!-- Scripts -->
        <script>
            let BASE_URL = {!! json_encode(url('/')) !!} + "/";
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-dblue relative">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow print:hidden">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                        {{ $header }}
                        @if(session('success'))
                        <div class="bg-green-500/40 text-dblue px-10 py-1 rounded-md feedbackmessage">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="bg-red-500/40 text-dblue px-10 py-1 rounded-md feedbackmessage">
                            {{ session('error') }}
                        </div>
                        @endif

                        <div class="text-left text-sm">
                            <p>LC: {{$lastc ? $lastc : 'N/A'}}</p>
                            <p>UD: {{$ud ? $ud : 'N/A'}}</p>
                            <p>CN: {{$cn ? $cn : 'N/A'}}</p>
                            <p>Bricks: {{$tb ? $tb : 0}}</p>
                            <p>Chips: {{$tc ? $tc : 0}}</p>
                        </div>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="">

                {{ $slot }}
            </main>
        </div>


        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js" integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- Cuatom js --}}
        <script src="{{asset('js/custom.js')}}"></script>
        @if (isset($pagescript))
            {{ $pagescript }}
        @endif
    </body>
</html>
