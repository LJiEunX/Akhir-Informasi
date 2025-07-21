<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white leading-tight">
            {{ __('Data Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('karyawan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Karyawan</a>

        <div class="mt-4 bg-white dark:bg-gray-800 shadow rounded p-4">
            <table class="min-w-full text-sm">
                <thead>
                    <tr>
                        <th class="text-left">Nama</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">No HP</th>
                        <th class="text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $karyawan)
                        <tr>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->email }}</td>
                            <td>{{ $karyawan->no_hp }}</td>
                            <td>
                                <a href="{{ route('karyawan.edit', $karyawan) }}" class="text-blue-600 hover:underline">Edit</a>
                                |
                                <form action="{{ route('karyawan.destroy', $karyawan) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin?')" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>