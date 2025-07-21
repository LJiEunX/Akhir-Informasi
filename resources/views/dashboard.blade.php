<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 dark:bg-gray-800 dark:text-white">
            <h1 class="text-lg font-bold mb-4">Ringkasan Sistem</h1>

            <div class="space-y-2">
                <p><strong>Jumlah Karyawan:</strong> {{ $jumlah_karyawan }}</p>
                <p><strong>Total Seluruh Gaji:</strong> Rp {{ number_format($total_gaji, 0, ',', '.') }}</p>
            </div>

            <div class="mt-6 space-x-4">
                <a href="{{ route('karyawan.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Kelola Karyawan
                </a>
                <a href="{{ route('gaji.index') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Kelola Gaji
                </a>
            </div>
        </div>
    </div>
</x-app-layout>