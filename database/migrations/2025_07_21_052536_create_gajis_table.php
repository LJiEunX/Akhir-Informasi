<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('gajis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('karyawan_id')->constrained()->onDelete('cascade');
        $table->string('bulan');
        $table->text('jumlah_gaji'); // nanti akan dienkripsi
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
