<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                <button onclick="toggleTheme()" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-md flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512" class="h-6 w-6 fill-current text-gray-700 dark:text-white">
                        <path d="M403.92 403.92c-40.84 40.85-94.38 61.27-147.92 61.27-53.54 0-107.08-20.42-147.92-61.27C67.23 363.08 46.81 309.54 46.81 256c0-53.54 20.42-107.08 61.27-147.92l5.06-5.06 295.84 295.84-5.06 5.06zM324.9 103.47c0-10.25 15.91-10.6 15.91 0v13.38c0 10.28-15.91 10.6-15.91 0v-13.38zm38.52 44.41c8.1 8.1 13.11 19.3 13.11 31.65 0 12.36-5 23.54-13.11 31.64-8.1 8.11-19.28 13.11-31.64 13.11s-23.55-5-31.65-13.11c-8.09-8.1-13.11-19.28-13.11-31.64s5.01-23.55 13.11-31.65c8.1-8.09 19.29-13.11 31.65-13.11 11.91 0 23.22 4.69 31.64 13.11zm-90.28-17.28c-7.41-7.4 3.86-18.62 11.24-11.24L294 129c7.09 7.5-4.11 18.36-11.41 11.06l-9.45-9.46zm-17.42 55.8c-10.41 0-10.41-15.91 0-15.91h13.37c10.43 0 10.42 15.91 0 15.91h-13.37zm27.13 51.76c-7.41 7.41-18.63-3.86-11.24-11.24l9.46-9.46c7.4-7.4 18.63 3.85 11.24 11.24l-9.46 9.46zm55.79 17.42c0 10.41-15.9 10.41-15.9 0v-13.37c0-10.42 15.9-10.42 15.9 0v13.37zm51.93-26.95c7.08 7.49-4.11 18.36-11.4 11.06l-9.63-9.63c-7.08-7.51 4.12-18.36 11.41-11.07l9.62 9.64zm17.26-55.97c10.25 0 10.6 15.9 0 15.9h-13.38c-10.28 0-10.6-15.9 0-15.9h13.38zm-27.13-51.77c7.4-7.4 18.63 3.85 11.24 11.25l-9.46 9.46c-7.4 7.4-18.64-3.85-11.24-11.25l9.46-9.46zM74.98 74.99C124.97 25 190.49 0 256 0s131.03 25 181.01 74.98C487 124.97 512 190.49 512 256s-25 131.03-74.98 181.01C387.03 487 321.51 512 256 512s-131.03-25-181.01-74.98C25 387.03 0 321.51 0 256S25 124.97 74.98 74.99zm15.18 15.16c-45.8 45.8-68.7 105.83-68.7 165.85 0 60.02 22.9 120.05 68.69 165.84 45.8 45.8 105.83 68.7 165.85 68.7 60.02 0 120.05-22.9 165.84-68.69 45.8-45.8 68.7-105.83 68.7-165.85 0-60.02-22.9-120.05-68.69-165.84-45.8-45.8-105.83-68.7-165.85-68.7-60.02 0-120.05 22.9-165.84 68.69zm106.58 165.12c-16.26 7.94-27.95 24.09-29.31 43.44-2.03 28.87 19.73 53.92 48.6 55.95 13.71.96 26.55-3.44 36.48-11.42 4.92-3.95 10-.47 7.86 4.52-11.74 27.36-39.82 45.62-71.2 43.41-39.66-2.79-69.55-37.19-66.76-76.85 2.67-38 34.52-67.14 72.21-66.79 6.94.06 8.42 4.66 2.12 7.74zm1.99 45.82.44.11c.84-3.59 2.94-6.42 6.25-8.47 3.32-2.05 6.77-2.66 10.37-1.81l.1-.44c-3.58-.85-6.41-2.94-8.46-6.25-2.05-3.33-2.66-6.78-1.81-10.36l-.44-.11c-.85 3.59-2.94 6.42-6.26 8.47-3.32 2.05-6.77 2.66-10.37 1.81l-.1.44c3.59.85 6.42 2.94 8.46 6.25 2.07 3.31 2.67 6.77 1.82 10.36zm39.77 23.21.55.13c1.07-4.51 3.69-8.05 7.85-10.63 4.17-2.58 8.51-3.33 13.02-2.27l.13-.55c-4.51-1.06-8.05-3.68-10.63-7.86-2.57-4.17-3.33-8.51-2.27-13.01l-.55-.13c-1.06 4.51-3.68 8.06-7.85 10.64-4.17 2.57-8.5 3.33-13.02 2.26l-.13.55c4.51 1.07 8.06 3.68 10.63 7.85 2.58 4.17 3.34 8.51 2.27 13.02z"/>
                    </svg>
                </button>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
