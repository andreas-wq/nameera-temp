@extends('layouts.app')

@section('title', 'Blank Page')

@section('breadcrumb', 'Blank')

@section('content')
<div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
    <!-- Page Header -->
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-800">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Blank Page</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Start your project from this clean canvas</p>
            </div>
            <button class="btn-primary flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Content
            </button>
        </div>
    </div>

    <!-- Content Area -->
    <div class="p-6">
        <!-- Welcome Message -->
        <div class="text-center py-12">
            <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-primary/10 flex items-center justify-center">
                <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.801 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.801 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Start Building Your Page</h3>
            <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-8">
                This is a blank page template. You can use this as a starting point for your custom pages.
                Add your content, components, and logic here.
            </p>
            
            <!-- Quick Action Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button class="btn-primary flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.801 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.801 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                    </svg>
                    Add Content
                </button>
                <button class="btn-secondary flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Import Data
                </button>
                <button class="btn-outline flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                    View Code
                </button>
            </div>
        </div>

        <!-- Grid Layout Example -->
        <div class="mb-12">
            <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Layout Examples</h4>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                <div class="border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center hover:border-primary/50 transition-colors">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-lg bg-primary/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </div>
                    <h5 class="font-medium text-gray-900 dark:text-white mb-2">Grid Layout</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Organize content in grid columns</p>
                </div>

                <!-- Card 2 -->
                <div class="border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center hover:border-primary/50 transition-colors">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-lg bg-primary/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h5 class="font-medium text-gray-900 dark:text-white mb-2">Forms</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Add interactive forms and inputs</p>
                </div>

                <!-- Card 3 -->
                <div class="border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center hover:border-primary/50 transition-colors">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-lg bg-primary/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h5 class="font-medium text-gray-900 dark:text-white mb-2">Charts</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Visualize data with charts</p>
                </div>
            </div>
        </div>

        <!-- Code Example -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300">How to Use This Page</h4>
                <button class="text-xs text-primary-600 hover:text-primary-500 dark:text-primary-400">
                    Copy Code
                </button>
            </div>
            <pre class="text-sm bg-gray-900 text-gray-100 p-4 rounded overflow-x-auto"><code>// Extend the main layout
&#64;extends('layouts.app')

// Set page title
&#64;section('title', 'Your Page Title')

// Set breadcrumb
&#64;section('breadcrumb', 'Your Breadcrumb')

// Add your content
&#64;section('content')
<div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
    <div class="p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
            Your Content Here
        </h2>
        <p class="text-gray-600 dark:text-gray-400">
            Start building your page...
        </p>
    </div>
</div>
&#64;endsection</code></pre>
        </div>

        <!-- Next Steps -->
        <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-800">
            <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Next Steps</h4>
            <ul class="space-y-3">
                <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Choose a layout structure for your content
                </li>
                <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Add your custom components and functionality
                </li>
                <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
                    </svg>
                    Connect to your database models and controllers
                </li>
                <li class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
                    </svg>
                    Style with Tailwind CSS utilities
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer Note -->
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-800 rounded-b-xl">
        <p class="text-sm text-gray-500 dark:text-gray-400 text-center">
            This is a clean, blank page template. Customize it to fit your needs.
        </p>
    </div>
</div>
@endsection