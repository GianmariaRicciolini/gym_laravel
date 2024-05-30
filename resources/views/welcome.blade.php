<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Gym Management') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Tailwind CSS (precompiled with Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mt-5 pt-5 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="bg-gray-200 dark:bg-gray-800 py-5 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold pt-5" style="font-size: 7rem">Welcome to {{ config('app.name') }}</h1>
            <p class="lead py-5 fs-2">Join our gym and explore a variety of fitness courses. Register now to start your fitness journey!</p>
            <div class="py-5">
                <a href="{{ route('register') }}" class="btn btn-danger btn-lg me-2">Register Now</a>
                <a href="{{ route('login') }}" class="btn btn-outline-danger btn-lg">Log in</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Apply the stored theme preference on load
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            function toggleTheme() {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }

            // Add event listener to the theme toggle button
            const themeToggleButton = document.querySelector('button[onclick="toggleTheme()"]');
            if (themeToggleButton) {
                themeToggleButton.addEventListener('click', toggleTheme);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

