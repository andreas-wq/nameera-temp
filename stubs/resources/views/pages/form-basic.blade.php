@extends('layouts.app')

@section('title', 'Basic Form Example')

@section('breadcrumb', 'Forms')

@section('content')
<div class="space-y-6">
    <!-- Form Examples -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Basic Form -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Basic Form Example</h2>
            
            <form x-data="{ 
                showPassword: false, 
                showConfirmPassword: false,
                formData: {
                    firstName: '',
                    lastName: '',
                    email: '',
                    password: '',
                    confirmPassword: '',
                    bio: '',
                    country: '',
                    terms: false
                },
                errors: {},
                submitForm() {
                    // Simple validation example
                    this.errors = {};
                    
                    if (!this.formData.firstName) {
                        this.errors.firstName = 'First name is required';
                    }
                    if (!this.formData.email) {
                        this.errors.email = 'Email is required';
                    }
                    if (!this.formData.password) {
                        this.errors.password = 'Password is required';
                    }
                    if (this.formData.password !== this.formData.confirmPassword) {
                        this.errors.confirmPassword = 'Passwords do not match';
                    }
                    if (!this.formData.terms) {
                        this.errors.terms = 'You must agree to the terms';
                    }
                    
                    if (Object.keys(this.errors).length === 0) {
                        alert('Form submitted successfully!');
                    }
                }
            }" @submit.prevent="submitForm">
                <div class="space-y-4">
                    <!-- First Name & Last Name -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <x-nameera::form.label for="firstName">First Name</x-nameera::form.label>
                            <x-nameera::form.input 
                                id="firstName"
                                x-model="formData.firstName"
                                placeholder="John"
                                :error="errors.firstName"
                                required
                            />
                        </div>
                        <div>
                            <x-nameera::form.label for="lastName">Last Name</x-nameera::form.label>
                            <x-nameera::form.input 
                                id="lastName"
                                x-model="formData.lastName"
                                placeholder="Doe"
                            />
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <x-nameera::form.label for="email" :required="true">Email Address</x-nameera::form.label>
                        <x-nameera::form.input 
                            id="email"
                            type="email"
                            x-model="formData.email"
                            placeholder="john@example.com"
                            :error="errors.email"
                            required
                        />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-nameera::form.label for="password" :required="true">Password</x-nameera::form.label>
                        <div class="relative">
                            <x-nameera::form.input 
                                id="password"
                                :x-bind:type="!showPassword ? 'password' : 'text'"
                                x-model="formData.password"
                                placeholder="••••••••"
                                :error="errors.password"
                                required
                                class="pr-10"
                            />
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
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
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-nameera::form.label for="confirmPassword" :required="true">Confirm Password</x-nameera::form.label>
                        <div class="relative">
                            <x-nameera::form.input 
                                id="confirmPassword"
                                :x-bind:type="!showConfirmPassword ? 'password' : 'text'"
                                x-model="formData.confirmPassword"
                                placeholder="••••••••"
                                :error="errors.confirmPassword"
                                required
                                class="pr-10"
                            />
                            <button
                                type="button"
                                @click="showConfirmPassword = !showConfirmPassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
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

                    <!-- Select Country -->
                    <div>
                        <x-nameera::form.label for="country">Country</x-nameera::form.label>
                        <x-nameera::form.select 
                            id="country"
                            x-model="formData.country"
                            :options="[
                                '' => 'Select a country',
                                'us' => 'United States',
                                'gb' => 'United Kingdom',
                                'ca' => 'Canada',
                                'au' => 'Australia',
                                'de' => 'Germany',
                            ]"
                        />
                    </div>

                    <!-- Bio -->
                    <div>
                        <x-nameera::form.label for="bio">Bio</x-nameera::form.label>
                        <x-nameera::form.textarea 
                            id="bio"
                            x-model="formData.bio"
                            placeholder="Tell us about yourself..."
                            rows="4"
                        />
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Brief description for your profile.</p>
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input 
                                id="terms" 
                                type="checkbox" 
                                x-model="formData.terms"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary/20 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary/40 dark:ring-offset-gray-800"
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-gray-900 dark:text-white">
                                I agree to the <a href="#" class="text-primary-600 hover:underline dark:text-primary-400">terms and conditions</a>
                            </label>
                            <x-nameera::form.error :message="errors.terms" />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="btn-primary w-full">
                            Create Account
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Form Variants -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Form Variants</h2>
            
            <div class="space-y-6">
                <!-- Disabled Input -->
                <div>
                    <x-nameera::form.label for="disabledInput">Disabled Field</x-nameera::form.label>
                    <x-nameera::form.input 
                        id="disabledInput"
                        value="This field is disabled"
                        disabled
                    />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Disabled fields cannot be edited.</p>
                </div>

                <!-- Read-only Input -->
                <div>
                    <x-nameera::form.label for="readonlyInput">Read-only Field</x-nameera::form.label>
                    <x-nameera::form.input 
                        id="readonlyInput"
                        value="This field is read-only"
                        readonly
                    />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Read-only fields can be selected but not edited.</p>
                </div>

                <!-- With Help Text -->
                <div>
                    <x-nameera::form.label for="helpInput">Field with Help Text</x-nameera::form.label>
                    <x-nameera::form.input 
                        id="helpInput"
                        placeholder="Enter your username"
                        help="Choose a unique username for your account"
                    />
                </div>

                <!-- With Error State -->
                <div>
                    <x-nameera::form.label for="errorInput">Field with Error</x-nameera::form.label>
                    <x-nameera::form.input 
                        id="errorInput"
                        value="invalid@email"
                        error="Please enter a valid email address"
                    />
                </div>

                <!-- Textarea Example -->
                <div>
                    <x-nameera::form.label for="textareaExample">Textarea Example</x-nameera::form.label>
                    <x-nameera::form.textarea 
                        id="textareaExample"
                        placeholder="Write a detailed description..."
                        rows="3"
                        help="You can write multiple lines of text here"
                    />
                </div>

                <!-- Checkbox Group -->
                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Notification Preferences</p>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Email notifications</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700" checked>
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Push notifications</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">SMS notifications</span>
                        </label>
                    </div>
                </div>

                <!-- Radio Group -->
                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Account Type</p>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="accountType" value="personal" class="border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700" checked>
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Personal Account</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="accountType" value="business" class="border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Business Account</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="accountType" value="enterprise" class="border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Enterprise Account</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Layout Examples -->
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Form Layout Examples</h2>
        
        <div class="space-y-8">
            <!-- Inline Form -->
            <div>
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Inline Form (Horizontal)</h3>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-12 md:items-center md:gap-6">
                    <div class="md:col-span-3">
                        <x-nameera::form.label for="inlineEmail" class="mb-0">Email</x-nameera::form.label>
                    </div>
                    <div class="md:col-span-5">
                        <x-nameera::form.input 
                            id="inlineEmail"
                            type="email"
                            placeholder="email@example.com"
                        />
                    </div>
                    <div class="md:col-span-4">
                        <button type="button" class="btn-secondary w-full">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>

            <!-- Two-column Grid Form -->
            <div>
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Two-column Grid Layout</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <x-nameera::form.label for="companyName">Company Name</x-nameera::form.label>
                        <x-nameera::form.input id="companyName" placeholder="Your Company" />
                    </div>
                    <div>
                        <x-nameera::form.label for="phone">Phone Number</x-nameera::form.label>
                        <x-nameera::form.input id="phone" type="tel" placeholder="+1 (555) 123-4567" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-nameera::form.label for="address">Address</x-nameera::form.label>
                        <x-nameera::form.input id="address" placeholder="123 Main St, City, State" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection