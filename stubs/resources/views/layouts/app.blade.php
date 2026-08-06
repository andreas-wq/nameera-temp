<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Upland Farm Admin'))</title>

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
<body class="bg-slate-50 text-gray-800 font-sans antialiased min-h-screen">
    <div class="flex min-h-screen">
        <!-- Floating Sidebar (Dark Green) -->
        <aside 
            class="fixed inset-y-4 left-4 z-50 w-64 bg-[#132a1b] rounded-3xl transition-transform duration-300 lg:translate-x-0 lg:static lg:ml-4 lg:my-4 lg:rounded-3xl"
            :class="{ '-translate-x-full': !sidebarOpen }"
            x-cloak
        >
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center h-20 px-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-green-500 flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-xl">🌿</span>
                        </div>
                        <div>
                            <span class="text-xl font-bold text-white">Upland Farm</span>
                            <span class="block text-xs text-green-300">Management System</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <x-nameera::nav-item href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" icon="dashboard" class="text-gray-300 hover:text-white hover:bg-green-800/30 active:bg-green-700 active:text-white">
                        Dashboard
                    </x-nameera::nav-item>
                    <x-nameera::nav-item href="{{ route('users.index') }}" :active="request()->routeIs('users.*')" icon="users" class="text-gray-300 hover:text-white hover:bg-green-800/30 active:bg-green-700 active:text-white">
                        Anggota
                    </x-nameera::nav-item>
                    <x-nameera::nav-item href="{{ route('farm.index') }}" :active="request()->routeIs('farm.*')" icon="leaf" class="text-gray-300 hover:text-white hover:bg-green-800/30 active:bg-green-700 active:text-white">
                        Lahan Pertanian
                    </x-nameera::nav-item>
                    <x-nameera::nav-item href="{{ route('harvest.index') }}" :active="request()->routeIs('harvest.*')" icon="package" class="text-gray-300 hover:text-white hover:bg-green-800/30 active:bg-green-700 active:text-white">
                        Hasil Panen
                    </x-nameera::nav-item>
                    <x-nameera::nav-item href="{{ route('finance.index') }}" :active="request()->routeIs('finance.*')" icon="credit-card" class="text-gray-300 hover:text-white hover:bg-green-800/30 active:bg-green-700 active:text-white">
                        Keuangan
                    </x-nameera::nav-item>
                    <x-nameera::nav-item href="{{ route('documents.index') }}" :active="request()->routeIs('documents.*')" icon="document" class="text-gray-300 hover:text-white hover:bg-green-800/30 active:bg-green-700 active:text-white">
                        Dokumen
                    </x-nameera::nav-item>
                    <x-nameera::nav-item href="{{ route('settings') }}" :active="request()->routeIs('settings')" icon="cog" class="text-gray-300 hover:text-white hover:bg-green-800/30 active:bg-green-700 active:text-white">
                        Pengaturan
                    </x-nameera::nav-item>
                </nav>

                <!-- User Menu -->
                <div class="p-6 border-t border-green-800/50">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded-full bg-green-600 flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-lg">A</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-white truncate">
                                {{ auth()->user()->name ?? 'Admin Upland' }}
                            </p>
                            <p class="text-xs text-green-300 truncate">
                                {{ auth()->user()->email ?? 'admin@uplandfarm.com' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col lg:ml-72">
            <!-- Header -->
            <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-sm border-b border-gray-200">
                <div class="flex items-center justify-between h-16 px-6">
                    <!-- Left: Mobile Menu Button -->
                    <button 
                        @click="sidebarOpen = !sidebarOpen"
                        class="p-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 lg:hidden"
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
                                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-green-700 font-medium">
                                        Dashboard
                                    </a>
                                </li>
                                @hasSection('breadcrumb')
                                    <li aria-current="page">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1 text-sm text-gray-700 font-medium">
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
                        <!-- Search -->
                        <div class="relative hidden md:block">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="search" placeholder="Cari..." class="pl-10 pr-4 py-2 w-64 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent focus:outline-none">
                        </div>

                        <!-- Dark Mode Toggle -->
                        <button 
                            @click="darkMode = !darkMode"
                            class="p-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100"
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
                        <button class="p-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 relative">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full border border-white"></span>
                        </button>

                        <!-- User Menu Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button 
                                @click="open = !open"
                                class="flex items-center space-x-3 p-2 rounded-xl hover:bg-gray-100"
                            >
                                <div class="w-9 h-9 rounded-full bg-green-600 flex items-center justify-center shadow">
                                    <span class="text-white font-semibold text-sm">A</span>
                                </div>
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div 
                                x-show="open" 
                                @click.away="open = false"
                                class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] border border-gray-200 py-2 z-50"
                                x-cloak
                            >
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name ?? 'Admin Upland' }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ auth()->user()->email ?? 'admin@uplandfarm.com' }}</p>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profil Saya
                                </a>
                                <a href="{{ route('settings') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Pengaturan
                                </a>
                                <div class="border-t border-gray-100 my-2"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-gray-50">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-green-50 border border-green-200 shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-green-800 font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Error Message -->
                @if(session('error'))
                    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-red-800 font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="px-6 py-4 border-t border-gray-200">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between text-sm text-gray-500">
                    <div class="mb-2 md:mb-0">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Upland Farm') }}. All rights reserved.
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-green-700">Privacy Policy</a>
                        <a href="#" class="hover:text-green-700">Terms of Service</a>
                        <a href="#" class="hover:text-green-700">Support</a>
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
