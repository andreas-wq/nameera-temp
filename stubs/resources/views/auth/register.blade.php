<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 
    showPassword: false, 
    showConfirmPassword: false,
    formData: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        agreeTerms: false
    }
}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register - {{ config('app.name', 'Nameera Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-primary-50 to-secondary-50 dark:from-secondary-900 dark:to-secondary-800 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary shadow-lg mb-4">
                <span class="text-white text-2xl font-bold">N</span>
            </div>
            <h1 class="text-3xl font-bold text-secondary-900 dark:text-white">Create Account</h1>
            <p class="text-secondary-600 dark:text-secondary-400 mt-2">Join our community today</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white dark:bg-secondary-800 rounded-2xl shadow-xl p-8">
            @if(session('status'))
                <div class="mb-6 p-4 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800">
                    <p class="text-green-800 dark:text-green-300 text-sm">{{ session('status') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <x-nameera::form.label for="name" :required="true">Full Name</x-nameera::form.label>
                    <x-nameera::form.input 
                        id="name"
                        type="text"
                        name="name"
                        x-model="formData.name"
                        value="{{ old('name') }}"
                        placeholder="John Doe"
                        :error="$errors->first('name')"
                        required
                        autofocus
                        autocomplete="name"
                        class="mt-1"
                    />
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <x-nameera::form.label for="email" :required="true">Email Address</x-nameera::form.label>
                    <x-nameera::form.input 
                        id="email"
                        type="email"
                        name="email"
                        x-model="formData.email"
                        value="{{ old('email') }}"
                        placeholder="you@example.com"
                        :error="$errors->first('email')"
                        required
                        autocomplete="email"
                        class="mt-1"
                    />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <x-nameera::form.label for="password" :required="true">Password</x-nameera::form.label>
                    <div class="relative">
                        <x-nameera::form.input 
                            id="password"
                            :x-bind:type="!showPassword ? 'password' : 'text'"
                            name="password"
                            x-model="formData.password"
                            placeholder="••••••••"
                            :error="$errors->first('password')"
                            required
                            autocomplete="new-password"
                            class="pr-10"
                        />
                        <button
                            type="button"
                            @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-secondary-400 hover:text-secondary-600 dark:hover:text-secondary-300"
                        >
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    <p class="mt-1 text-xs text-secondary-500 dark:text-secondary-400">Must be at least 8 characters</p>
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-nameera::form.label for="password_confirmation" :required="true">Confirm Password</x-nameera::form.label>
                    <div class="relative">
                        <x-nameera::form.input 
                            id="password_confirmation"
                            :x-bind:type="!showConfirmPassword ? 'password' : 'text'"
                            name="password_confirmation"
                            x-model="formData.password_confirmation"
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                            class="pr-10"
                        />
                        <button
                            type="button"
                            @click="showConfirmPassword = !showConfirmPassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-secondary-400 hover:text-secondary-600 dark:hover:text-secondary-300"
                        >
                            <svg x-show="!showConfirmPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showConfirmPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Terms Agreement -->
                <div class="mb-6">
                    <label class="flex items-start">
                        <div class="flex items-center h-5">
                            <input 
                                id="agreeTerms" 
                                name="agreeTerms" 
                                type="checkbox" 
                                x-model="formData.agreeTerms"
                                class="w-4 h-4 border border-secondary-300 rounded bg-secondary-50 focus:ring-3 focus:ring-primary/20 dark:bg-secondary-700 dark:border-secondary-600 dark:focus:ring-primary/40 dark:ring-offset-secondary-800"
                                required
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="agreeTerms" class="text-secondary-700 dark:text-secondary-300">
                                I agree to the <a href="#" class="text-primary-600 hover:text-primary-500 dark:text-primary-400">terms and conditions</a>
                            </label>
                            @error('agreeTerms')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full btn-primary py-3 text-base font-medium">
                    Create Account
                </button>

                <!-- Divider -->
                <div class="mt-8 pt-6 border-t border-secondary-200 dark:border-secondary-700">
                    <p class="text-center text-sm text-secondary-600 dark:text-secondary-400">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400">
                            Sign in
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-secondary-500 dark:text-secondary-400">
                &copy; {{ date('Y') }} {{ config('app.name', 'Nameera Admin') }}. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>