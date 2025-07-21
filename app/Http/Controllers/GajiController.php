<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GajiController extends Controller
{
    public function index()
{
    if (auth()->user()->role === 'admin') {
        // Admin melihat semua gaji
        $gajis = Gaji::with('karyawan')->get();
    } else {
        // User biasa hanya melihat gajinya sendiri
        $gajis = Gaji::with('karyawan')->where('user_id', auth()->id())->get();
    }

    return view('gaji.index', compact('gajis'));
}

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('gaji.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'bulan' => 'required',
            'jumlah_gaji' => 'required|numeric',
        ]);

        Gaji::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'jumlah_gaji' => Crypt::encrypt($request->jumlah_gaji),
        ]);

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil ditambahkan.');
    }

    public function edit(Gaji $gaji)
    {
        $gaji->jumlah_gaji = Crypt::decrypt($gaji->jumlah_gaji);
        $karyawans = Karyawan::all();
        return view('gaji.edit', compact('gaji', 'karyawans'));
    }

    public function update(Request $request, Gaji $gaji)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'bulan' => 'required',
            'jumlah_gaji' => 'required|numeric',
        ]);

        $gaji->update([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'jumlah_gaji' => Crypt::encrypt($request->jumlah_gaji),
        ]);

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return back()->with('success', 'Data gaji berhasil dihapus.');
    }
}