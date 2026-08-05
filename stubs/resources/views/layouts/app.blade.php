<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Nameera Admin'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Plugin CDNs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond@^4/dist/filepond.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/skins/ui/oxide/content.min.css">

    @stack('head')
</head>
<body class="bg-background text-text font-sans antialiased min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside 
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 transition-transform duration-300 lg:translate-x-0 lg:static"
            :class="{ '-translate-x-full': !sidebarOpen }"
            x-cloak
        >
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200 dark:border-gray-800">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center">
                            <span class="text-white font-bold text-lg">N</span>
                        </div>
                        <span class="text-xl font-bold text-gray-900 dark:text-white">Nameera</span>
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                    <x-nameera-nav-item href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" icon="dashboard">
                        Dashboard
                    </x-nameera-nav-item>
                    <x-nameera-nav-item href="{{ route('users.index') }}" :active="request()->routeIs('users.*')" icon="users">
                        Pengguna
                    </x-nameera-nav-item>
                    <x-nameera-nav-item href="{{ route('documents.index') }}" :active="request()->routeIs('documents.*')" icon="document">
                        Dokumen
                    </x-nameera-nav-item>
                    <x-nameera-nav-item href="{{ route('settings') }}" :active="request()->routeIs('settings')" icon="cog">
                        Pengaturan
                    </x-nameera-nav-item>
                </nav>

                <!-- User Menu -->
                <div class="p-4 border-t border-gray-200 dark:border-gray-800">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                            <span class="text-primary font-medium">A</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                {{ auth()->user()->name ?? 'Administrator' }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                {{ auth()->user()->email ?? 'admin@example.com' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:pl-64">
            <!-- Header -->
            <header class="sticky top-0 z-40 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
                <div class="flex items-center justify-between h-16 px-4 lg:px-6">
                    <!-- Left: Mobile Menu Button -->
                    <button 
                        @click="sidebarOpen = !sidebarOpen"
                        class="p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 lg:hidden"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Center: Breadcrumb -->
                    <div class="flex-1 px-4">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:text-primary">
                                        Dashboard
                                    </a>
                                </li>
                                @hasSection('breadcrumb')
                                    <li aria-current="page">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1 text-sm text-gray-500 dark:text-gray-400">
                                                @yield('breadcrumb')
                                            </span>
                                        </div>
                                    </li>
                                @endif
                            </ol>
                        </nav>
                    </div>

                    <!-- Right: Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Dark Mode Toggle -->
                        <button 
                            @click="darkMode = !darkMode"
                            class="p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800"
                            :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
                        >
                            <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </button>

                        <!-- Notifications -->
                        <button class="p-2 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 relative">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- User Menu Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button 
                                @click="open = !open"
                                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800"
                            >
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="text-primary font-medium">A</span>
                                </div>
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div 
                                x-show="open" 
                                @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-900 rounded-lg shadow-lg border border-gray-200 dark:border-gray-800 py-1 z-50"
                                x-cloak
                            >
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                                    Profil Saya
                                </a>
                                <a href="{{ route('settings') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                                    Pengaturan
                                </a>
                                <div class="border-t border-gray-200 dark:border-gray-800 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-800">
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 lg:p-6">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-green-800 dark:text-green-300">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-red-800 dark:text-red-300">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="border-t border-gray-200 dark:border-gray-800 px-4 lg:px-6 py-4">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between text-sm text-gray-500 dark:text-gray-400">
                    <div class="mb-2 md:mb-0">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Nameera Admin') }}. All rights reserved.
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-primary">Privacy Policy</a>
                        <a href="#" class="hover:text-primary">Terms of Service</a>
                        <a href="#" class="hover:text-primary">Support</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div 
        x-show="sidebarOpen" 
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
        x-cloak
    ></div>

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>