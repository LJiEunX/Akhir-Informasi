<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white leading-tight">
            {{ __('Edit Gaji') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('gaji.update', $gaji->id) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 shadow rounded">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="karyawan_id" class="block text-sm font-medium text-gray-700 dark:text-white">Karyawan</label>
                <select name="karyawan_id" id="karyawan_id" class="w-full mt-1 border-gray-300 rounded" required>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}" {{ $gaji->karyawan_id == $karyawan->id ? 'selected' : '' }}>
                            {{ $karyawan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="bulan" class="block text-sm font-medium text-gray-700 dark:text-white">Bulan</label>
                <input type="text" name="bulan" id="bulan" value="{{ $gaji->bulan }}" class="w-full mt-1 border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="jumlah_gaji" class="block text-sm font-medium text-gray-700 dark:text-white">Jumlah Gaji</label>
                <input type="number" name="jumlah_gaji" id="jumlah_gaji" value="{{ $gaji->jumlah_gaji }}" class="w-full mt-1 border-gray-300 rounded" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        </form>
    </div>
</x-app-layout>