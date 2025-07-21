<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Data Gaji Saya') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            @if (Auth::user()->role === 'admin')
                <h3 class="font-bold mb-4">Semua Data Gaji</h3>
            @else
                <h3 class="font-bold mb-4">Gaji Anda</h3>
            @endif

            @if($gajis->count())
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr>
                            @if(Auth::user()->role === 'admin')
                                <th class="border px-4 py-2">Nama Karyawan</th>
                            @endif
                            <th class="border px-4 py-2">Bulan</th>
                            <th class="border px-4 py-2">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gajis as $gaji)
                            <tr>
                                @if(Auth::user()->role === 'admin')
                                    <td class="border px-4 py-2">{{ $gaji->karyawan->nama }}</td>
                                @endif
                                <td class="border px-4 py-2">{{ $gaji->bulan }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format(Crypt::decrypt($gaji->jumlah_gaji),0,',','.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Tidak ada data gaji.</p>
            @endif
        </div>
    </div>
</x-app-layout>