<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">



    <section class="max-w-7xl mx-auto flex justify-center items-center min-h-screen relative">
        <div class="">
            <div class="">

                <img src="{{ asset('images/ebo.png') }}" alt="" srcset="">
                <h1 class="text-center text-3xl italic font-semibold">eco friendly bricks manufacturer</h1>
            </div>
            <div class="">
                @if (Route::has('login'))
                    <nav class="flex flex-1 justify-center gap-5">
                        @auth
                            <div class="flex justify-center items-center mt-6 gap-4">
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 bg-brick border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lgreen focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Cash Panel') }}
                                </a>
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 bg-brick border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lgreen focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Sales Panel') }}
                                </a>
                            </div>
                        @endauth
                    </nav>
                @endif
            </div>


        </div>
        <div class="fixed bottom-0 w-full py-4">
            <p class="text-center">Developed by <a href="https://www.shadapixel.com/" target="_blank" rel="noopener noreferrer hover:scale-1.1" class="text-teal-500 font-space text-bold">Shada Pixel</a></p>
        </div>
    </section>
</body>

</html>
