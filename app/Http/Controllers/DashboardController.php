<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Gaji;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_karyawan = Karyawan::count();

        $total_gaji = 0;
        foreach (Gaji::all() as $gaji) {
            try {
                $total_gaji += Crypt::decrypt($gaji->jumlah_gaji);
            } catch (\Exception $e) {
                // skip jika gagal dekripsi
            }
        }

        return view('dashboard', compact('jumlah_karyawan', 'total_gaji'));
    }
}