@extends('nameera::layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Card -->
    <div class="card p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-secondary-900 dark:text-white">Welcome back, {{ auth()->user()->name ?? 'Admin' }}!</h2>
                <p class="text-secondary-600 dark:text-secondary-400 mt-1">Here's what's happening with your system today.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    System is online
                </span>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="card p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-primary-100 dark:bg-primary-900/30">
                    <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-secondary-600 dark:text-secondary-400">Total Users</p>
                    <p class="text-2xl font-bold text-secondary-900 dark:text-white">1,248</p>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm">
                    <span class="text-green-600 dark:text-green-400 font-medium">+12.5%</span>
                    <span class="text-secondary-500 dark:text-secondary-400 ml-2">from last month</span>
                </div>
            </div>
        </div>

        <div class="card p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-green-100 dark:bg-green-900/30">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.801 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.801 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-secondary-600 dark:text-secondary-400">Documents</p>
                    <p class="text-2xl font-bold text-secondary-900 dark:text-white">856</p>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm">
                    <span class="text-green-600 dark:text-green-400 font-medium">+8.2%</span>
                    <span class="text-secondary-500 dark:text-secondary-400 ml-2">from last month</span>
                </div>
            </div>
        </div>

        <div class="card p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-blue-100 dark:bg-blue-900/30">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-secondary-600 dark:text-secondary-400">Avg. Response Time</p>
                    <p class="text-2xl font-bold text-secondary-900 dark:text-white">1.2s</p>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm">
                    <span class="text-red-600 dark:text-red-400 font-medium">-0.3s</span>
                    <span class="text-secondary-500 dark:text-secondary-400 ml-2">from last month</span>
                </div>
            </div>
        </div>

        <div class="card p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-purple-100 dark:bg-purple-900/30">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-secondary-600 dark:text-secondary-400">Revenue</p>
                    <p class="text-2xl font-bold text-secondary-900 dark:text-white">$24.8K</p>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm">
                    <span class="text-green-600 dark:text-green-400 font-medium">+18.4%</span>
                    <span class="text-secondary-500 dark:text-secondary-400 ml-2">from last month</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Quick Stats -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Documents -->
        <div class="card lg:col-span-2">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-secondary-900 dark:text-white">Recent Documents</h3>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-sm text-secondary-600 dark:text-secondary-400 border-b border-border">
                                <th class="pb-3 font-medium">Document</th>
                                <th class="pb-3 font-medium">Type</th>
                                <th class="pb-3 font-medium">Status</th>
                                <th class="pb-3 font-medium">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            @for($i = 0; $i < 5; $i++)
                            <tr class="text-sm">
                                <td class="py-3">
                                    <div class="font-medium text-secondary-900 dark:text-white">Surat Pengajuan {{ $i + 1 }}</div>
                                    <div class="text-secondary-500 dark:text-secondary-400">SP/2024/00{{ $i + 1 }}</div>
                                </td>
                                <td class="py-3">
                                    <span class="badge-info">Internal</span>
                                </td>
                                <td class="py-3">
                                    <span class="badge-success">Approved</span>
                                </td>
                                <td class="py-3 text-secondary-500 dark:text-secondary-400">
                                    {{ now()->subDays($i)->format('M d, Y') }}
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-center">
                    <a href="#" class="text-primary-600 hover:text-primary-500 dark:text-primary-400 text-sm font-medium">
                        View all documents →
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-secondary-900 dark:text-white">Quick Actions</h3>
            </div>
            <div class="p-6 space-y-4">
                <a href="#" class="flex items-center p-3 rounded-lg border border-border hover:bg-secondary-50 dark:hover:bg-secondary-800 transition-colors">
                    <div class="p-2 rounded-lg bg-primary-100 dark:bg-primary-900/30">
                        <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-medium text-secondary-900 dark:text-white">Create New Document</p>
                        <p class="text-sm text-secondary-500 dark:text-secondary-400">Start drafting a new document</p>
                    </div>
                </a>

                <a href="#" class="flex items-center p-3 rounded-lg border border-border hover:bg-secondary-50 dark:hover:bg-secondary-800 transition-colors">
                    <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-medium text-secondary-900 dark:text-white">Manage Users</p>
                        <p class="text-sm text-secondary-500 dark:text-secondary-400">Add or remove system users</p>
                    </div>
                </a>

                <a href="#" class="flex items-center p-3 rounded-lg border border-border hover:bg-secondary-50 dark:hover:bg-secondary-800 transition-colors">
                    <div class="p-2 rounded-lg bg-blue-100 dark:bg-blue-900/30">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-medium text-secondary-900 dark:text-white">System Settings</p>
                        <p class="text-sm text-secondary-500 dark:text-secondary-400">Configure system preferences</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection