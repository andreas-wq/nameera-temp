@extends('layouts.app')

@section('title', 'Data Table Example')

@section('breadcrumb', 'Tables')

@section('content')
<div class="space-y-6">
    <!-- Data Table Card -->
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
        <!-- Header with Search and Actions -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-800">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Surat Masuk/Keluar</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Showing 1-10 of 125 documents</p>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Search Bar -->
                    <div class="relative flex-1 sm:w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <x-nameera::form.input 
                            placeholder="Search documents..." 
                            class="pl-10"
                        />
                    </div>
                    <!-- Filter Button -->
                    <button class="btn-secondary flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>
                    <!-- Add Button -->
                    <button class="btn-primary flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Document
                    </button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700">
                                <span>No</span>
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Document No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">From/To</th>
                        <th class="px6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @php
                        $documents = [
                            ['no' => 'SM/001/2024', 'type' => 'Surat Masuk', 'subject' => 'Permintaan Data Karyawan', 'from' => 'Dinas Pendidikan', 'date' => '2024-01-15', 'status' => 'Pending'],
                            ['no' => 'SK/001/2024', 'type' => 'Surat Keluar', 'subject' => 'Pengajuan Anggaran', 'to' => 'Keuangan Daerah', 'date' => '2024-01-14', 'status' => 'Approved'],
                            ['no' => 'SM/002/2024', 'type' => 'Surat Masuk', 'subject' => 'Undangan Rapat', 'from' => 'Badan Kepegawaian', 'date' => '2024-01-13', 'status' => 'Processed'],
                            ['no' => 'SK/002/2024', 'type' => 'Surat Keluar', 'subject' => 'Laporan Bulanan', 'to' => 'Sekretariat', 'date' => '2024-01-12', 'status' => 'Approved'],
                            ['no' => 'SM/003/2024', 'type' => 'Surat Masuk', 'subject' => 'Permohonan Izin', 'from' => 'Bagian Umum', 'date' => '2024-01-11', 'status' => 'Rejected'],
                            ['no' => 'SM/004/2024', 'type' => 'Surat Masuk', 'subject' => 'Nota Dinas', 'from' => 'Sub Bagian Tata Usaha', 'date' => '2024-01-10', 'status' => 'Pending'],
                            ['no' => 'SK/003/2024', 'type' => 'Surat Keluar', 'subject' => 'Surat Edaran', 'to' => 'Semua Unit', 'date' => '2024-01-09', 'status' => 'Approved'],
                            ['no' => 'SM/005/2024', 'type' => 'Surat Masuk', 'subject' => 'Permintaan Dokumen', 'from' => 'Badan Pemeriksa', 'date' => '2024-01-08', 'status' => 'Processed'],
                            ['no' => 'SK/004/2024', 'type' => 'Surat Keluar', 'subject' => 'Balasan Permohonan', 'to' => 'Kantor Wilayah', 'date' => '2024-01-07', 'status' => 'Approved'],
                            ['no' => 'SM/006/2024', 'type' => 'Surat Masuk', 'subject' => 'Undangan Workshop', 'from' => 'Diklat Provinsi', 'date' => '2024-01-06', 'status' => 'Pending'],
                        ];
                    @endphp
                    
                    @foreach($documents as $index => $doc)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700">
                                <span class="text-sm text-gray-900 dark:text-white">{{ $index + 1 }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $doc['no'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $doc['type'] === 'Surat Masuk' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400' : 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400' }}">
                                {{ $doc['type'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $doc['subject'] }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Doc #{{ $index + 100 }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">
                                @if(isset($doc['from']))
                                    <span class="text-gray-600 dark:text-gray-400">From: </span>{{ $doc['from'] }}
                                @else
                                    <span class="text-gray-600 dark:text-gray-400">To: </span>{{ $doc['to'] }}
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ date('d M Y', strtotime($doc['date'])) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusClasses = [
                                    'Pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400',
                                    'Approved' => 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
                                    'Processed' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
                                    'Rejected' => 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400',
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses[$doc['status']] }}">
                                {{ $doc['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <button class="text-primary-600 hover:text-primary-900 dark:text-primary-400 dark:hover:text-primary-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer with Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-800">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Showing <span class="font-medium text-gray-700 dark:text-gray-300">1</span> to 
                    <span class="font-medium text-gray-700 dark:text-gray-300">10</span> of 
                    <span class="font-medium text-gray-700 dark:text-gray-300">125</span> results
                </div>
                <nav class="inline-flex -space-x-px shadow-sm rounded-lg">
                    <!-- Previous Button -->
                    <button class="relative inline-flex items-center px-2 py-2 rounded-l-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    
                    <!-- Page Numbers -->
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 bg-primary-50 dark:bg-primary-900/20 text-sm font-medium text-primary-600 dark:text-primary-400">
                        1
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        2
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        3
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        ...
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        12
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        13
                    </button>
                    
                    <!-- Next Button -->
                    <button class="relative inline-flex items-center px-2 py-2 rounded-r-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <!-- Table Variants -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Compact Table -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Compact Table</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-500 dark:text-gray-400">Name</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-500 dark:text-gray-400">Position</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-500 dark:text-gray-400">Department</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach([
                            ['John Doe', 'Senior Developer', 'IT'],
                            ['Jane Smith', 'Project Manager', 'Management'],
                            ['Robert Johnson', 'Designer', 'Creative'],
                            ['Sarah Williams', 'QA Engineer', 'Testing'],
                        ] as $employee)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="px-4 py-2">{{ $employee[0] }}</td>
                            <td class="px-4 py-2">{{ $employee[1] }}</td>
                            <td class="px-4 py-2">{{ $employee[2] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Striped Table -->
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Striped Table</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="px-4 py-2 text-left font-medium text-gray-500 dark:text-gray-400">Product</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-500 dark:text-gray-400">Price</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-500 dark:text-gray-400">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach([
                            ['Laptop Pro', '$1,299', 'In Stock'],
                            ['Wireless Mouse', '$49', 'Low Stock'],
                            ['Keyboard', '$89', 'In Stock'],
                            ['Monitor 27"', '$399', 'Out of Stock'],
                        ] as $index => $product)
                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-50 dark:bg-gray-800' : '' }}">
                            <td class="px-4 py-2">{{ $product[0] }}</td>
                            <td class="px-4 py-2">{{ $product[1] }}</td>
                            <td class="px-4 py-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium 
                                    {{ $product[2] === 'In Stock' ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400' : 
                                       ($product[2] === 'Low Stock' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400' : 
                                       'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-400') }}">
                                    {{ $product[2] }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection