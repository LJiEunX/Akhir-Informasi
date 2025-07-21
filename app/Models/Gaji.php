<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Gaji extends Model
{
    protected $fillable = [
        'karyawan_id',
        'bulan',
        'jumlah_gaji',
    ];

    // Relasi: Gaji belongs to Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    // Optional: Getter untuk jumlah_gaji yang sudah didekripsi
    public function getJumlahGajiDecryptAttribute()
    {
        try {
            return Crypt::decrypt($this->jumlah_gaji);
        } catch (\Exception $e) {
            return 'Gagal dekripsi';
        }
    }
}