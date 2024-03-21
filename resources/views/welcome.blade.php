<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes APP</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div class="relative min-h-screen  selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                <h1 class="text-xl font-semibold text-center lg:text-left lg:col-span-2">Welcome to Notes APP</h1>
                <nav class="flex justify-center lg:justify-end">
                    @if (Route::has('login'))
                        <div class="flex space-x-4">
                            @auth
                                <a href="{{ url('/notes/create') }}" class="btn font-bold ">ADD NOTES</a>
                            @else
                                <a href="{{ route('login') }}" class="btn">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </nav>
            </header>
            <main class="mt-6">

            </main>
        </div>
    </div>
</div>
</body>
</html>
