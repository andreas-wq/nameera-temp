@extends('layouts.app')

@section('title', 'Dashboard Upland Farm')

@section('breadcrumb', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- HERO BANNER -->
    <div class="bg-[#4d8b31] rounded-3xl p-8 text-white shadow-lg">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Selamat Datang, Admin!</h1>
                <p class="text-green-100 opacity-90 max-w-2xl">
                    Selamat datang di Sistem Manajemen Upland Farm. Pantau aktivitas pertanian, kelola anggota, dan 
                    awasi hasil panen dengan mudah dari dashboard ini.
                </p>
            </div>
            <div class="mt-6 lg:mt-0">
                <button class="bg-white text-green-700 font-semibold py-3 px-6 rounded-2xl hover:bg-green-50 transition-colors shadow-lg">
                    📊 Lihat Laporan Lengkap
                </button>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-sm">
                <p class="text-sm text-green-100">Hari ini</p>
                <p class="text-2xl font-bold">23°C</p>
                <p class="text-xs text-green-200">Suhu Rata-rata</p>
            </div>
            <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-sm">
                <p class="text-sm text-green-100">Kelembaban</p>
                <p class="text-2xl font-bold">78%</p>
                <p class="text-xs text-green-200">Optimal</p>
            </div>
            <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-sm">
                <p class="text-sm text-green-100">Curah Hujan</p>
                <p class="text-2xl font-bold">25mm</p>
                <p class="text-xs text-green-200">7 Hari Terakhir</p>
            </div>
            <div class="bg-white/20 p-4 rounded-2xl backdrop-blur-sm">
                <p class="text-sm text-green-100">Status</p>
                <p class="text-2xl font-bold">Aktif</p>
                <p class="text-xs text-green-200">Semua Sistem</p>
            </div>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Anggota -->
        <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
            <div class="flex items-center">
                <div class="p-3 rounded-2xl bg-green-50">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-1.205a6 6 0 01-9 5.197" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Anggota</p>
                    <p class="text-2xl font-bold text-gray-900">1,247</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="inline-flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    +12.5% dari bulan lalu
                </span>
            </div>
        </div>

        <!-- Luas Lahan -->
        <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
            <div class="flex items-center">
                <div class="p-3 rounded-2xl bg-blue-50">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Luas Lahan</p>
                    <p class="text-2xl font-bold text-gray-900">542 Ha</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="inline-flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    +8.2% ekspansi
                </span>
            </div>
        </div>

        <!-- Hasil Panen -->
        <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
            <div class="flex items-center">
                <div class="p-3 rounded-2xl bg-yellow-50">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Hasil Panen</p>
                    <p class="text-2xl font-bold text-gray-900">12.4T</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="inline-flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    +15.3% peningkatan
                </span>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
            <div class="flex items-center">
                <div class="p-3 rounded-2xl bg-purple-50">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Pendapatan</p>
                    <p class="text-2xl font-bold text-gray-900">Rp 4.2M</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="inline-flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    +10.8% bulan ini
                </span>
            </div>
        </div>
    </div>

    <!-- CHART & DATA VISUALIZATION -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Chart Area -->
        <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Grafik Hasil Panen</h2>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-sm rounded-2xl border border-gray-300 hover:bg-gray-50 bg-gray-50">
                        Bulan Ini
                    </button>
                    <button class="px-3 py-1 text-sm rounded-2xl border border-gray-300 hover:bg-gray-50">
                        Tahun Ini
                    </button>
                </div>
            </div>
            <!-- Chart Placeholder -->
            <div class="h-64 flex items-center justify-center border-2 border-dashed border-gray-300 rounded-2xl">
                <div class="text-center">
                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <p class="mt-2 text-sm text-gray-600">Grafik Hasil Panen Tahunan</p>
                    <p class="text-xs text-gray-500">Integrasikan dengan library chart favorit Anda</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h2>
                <button class="text-sm text-green-600 hover:text-green-700 font-medium">
                    Lihat Semua
                </button>
            </div>
            <div class="space-y-4">
                @foreach([
                    ['user' => 'Agus Santoso', 'action' => 'melaporkan panen padi', 'time' => '2 jam lalu', 'icon' => '🌾'],
                    ['user' => 'Siti Aisyah', 'action' => 'mengupdate data lahan', 'time' => '4 jam lalu', 'icon' => '🌱'],
                    ['user' => 'Budi Hartono', 'action' => 'mengajukan pinjaman', 'time' => '6 jam lalu', 'icon' => '💰'],
                    ['user' => 'Rina Wati', 'action' => 'menambahkan anggota baru', 'time' => '8 jam lalu', 'icon' => '👥'],
                    ['user' => 'Joko Widodo', 'action' => 'mengkonfirmasi pengiriman', 'time' => '10 jam lalu', 'icon' => '🚚'],
                ] as $activity)
                <div class="flex items-center p-3 rounded-2xl hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">
                            <span class="text-lg">{{ $activity['icon'] }}</span>
                        </div>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            {{ $activity['user'] }} <span class="font-normal text-gray-600">{{ $activity['action'] }}</span>
                        </p>
                        <p class="text-xs text-gray-500">{{ $activity['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- QUICK ACTIONS & TASKS -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Quick Actions -->
        <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Aksi Cepat</h2>
            <div class="grid grid-cols-2 gap-4">
                <button class="flex flex-col items-center p-4 rounded-2xl border border-gray-200 hover:bg-gray-50 transition-colors">
                    <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Tambah Anggota</span>
                </button>
                <button class="flex flex-col items-center p-4 rounded-2xl border border-gray-200 hover:bg-gray-50 transition-colors">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Laporan Bulanan</span>
                </button>
                <button class="flex flex-col items-center p-4 rounded-2xl border border-gray-200 hover:bg-gray-50 transition-colors">
                    <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Monitor Lahan</span>
                </button>
                <button class="flex flex-col items-center p-4 rounded-2xl border border-gray-200 hover:bg-gray-50 transition-colors">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Keamanan</span>
                </button>
            </div>
        </div>

        <!-- Upcoming Tasks -->
        <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Tugas Mendatang</h2>
            <div class="space-y-4">
                @foreach([
                    ['task' => 'Verifikasi data anggota baru', 'due' => 'Hari ini', 'priority' => 'high'],
                    ['task' => 'Laporan hasil panen triwulan', 'due' => '2 hari lagi', 'priority' => 'medium'],
                    ['task' => 'Pemeliharaan sistem irigasi', 'due' => 'Minggu depan', 'priority' => 'medium'],
                    ['task' => 'Pelatihan teknologi pertanian', 'due' => '2 minggu lagi', 'priority' => 'low'],
                ] as $task)
                <div class="flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors">
                    <div class="flex items-center">
                        <div class="w-2 h-2 rounded-full mr-3 
                            {{ $task['priority'] === 'high' ? 'bg-red-500' : 
                               ($task['priority'] === 'medium' ? 'bg-yellow-500' : 'bg-green-500') }}">
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $task['task'] }}</p>
                            <p class="text-xs text-gray-500">Jatuh tempo: {{ $task['due'] }}</p>
                        </div>
                    </div>
                    <button class="text-sm text-green-600 hover:text-green-700">
                        Tandai Selesai
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- SYSTEM STATUS -->
    <div class="bg-white rounded-3xl p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07)]">
        <h2 class="text-lg font-semibold text-gray-900 mb-6">Status Sistem</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="text-center p-4 rounded-2xl bg-green-50">
                <p class="text-sm text-gray-600">Database</p>
                <p class="text-2xl font-bold text-green-600">Online</p>
                <p class="text-xs text-green-500">100% Uptime</p>
            </div>
            <div class="text-center p-4 rounded-2xl bg-blue-50">
                <p class="text-sm text-gray-600">Server</p>
                <p class="text-2xl font-bold text-blue-600">Stabil</p>
                <p class="text-xs text-blue-500">CPU: 42%</p>
            </div>
            <div class="text-center p-4 rounded-2xl bg-yellow-50">
                <p class="text-sm text-gray-600">Backup</p>
                <p class="text-2xl font-bold text-yellow-600">24 Jam Lalu</p>
                <p class="text-xs text-yellow-500">Terkini</p>
            </div>
            <div class="text-center p-4 rounded-2xl bg-purple-50">
                <p class="text-sm text-gray-600">Security</p>
                <p class="text-2xl font-bold text-purple-600">Aman</p>
                <p class="text-xs text-purple-500">Scan Terbaru</p>
            </div>
        </div>
    </div>
</div>
@endsection
