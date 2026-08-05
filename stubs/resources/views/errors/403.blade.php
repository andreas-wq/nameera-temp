<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>403 - Forbidden - {{ config('app.name', 'Nameera Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/admin.css'])
</head>
<body class="min-h-screen bg-gradient-to-br from-primary-50 to-secondary-50 dark:from-secondary-900 dark:to-secondary-800 flex items-center justify-center p-4">
    <div class="w-full max-w-lg text-center">
        <!-- Error Code -->
        <div class="mb-8">
            <div class="inline-flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 shadow-2xl">
                <span class="text-white text-6xl font-bold">403</span>
            </div>
        </div>

        <!-- Title & Message -->
        <h1 class="text-4xl font-bold text-secondary-900 dark:text-white mb-4">Access Forbidden</h1>
        <p class="text-xl text-secondary-600 dark:text-secondary-400 mb-8">
            You don't have permission to access this page.
        </p>
        <p class="text-secondary-500 dark:text-secondary-500 mb-10 max-w-md mx-auto">
            The page you are trying to access is restricted. Please contact your administrator if you believe this is an error.
        </p>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url()->previous() }}" class="btn-outline px-6 py-3">
                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Go Back
            </a>
            <a href="{{ route('dashboard') }}" class="btn-primary px-6 py-3">
                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
        </div>

        <!-- Support -->
        <div class="mt-12 pt-8 border-t border-secondary-200 dark:border-secondary-700">
            <p class="text-sm text-secondary-500 dark:text-secondary-400">
                Need help? <a href="mailto:support@example.com" class="text-primary-600 hover:text-primary-500 dark:text-primary-400 font-medium">Contact Support</a>
            </p>
        </div>
    </div>
</body>
</html>