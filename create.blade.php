<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('kabupaten', 100);
            $table->string('kecamatan', 100);
            $table->string('desa', 100);
            $table->string('luas_subak', 50);
            $table->string('batas_timur', 255)->nullable();
            $table->string('batas_barat', 255)->nullable();
            $table->string('batas_utara', 255)->nullable();
            $table->string('batas_selatan', 255)->nullable();
            $table->string('jumlah_anggota', 100)->nullable();
            $table->string('nama_pekaseh', 255)->nullable();
            $table->string('no_telp', 50)->nullable();
            $table->string('sumber_air', 255)->nullable();
            $table->string('kecukupan_kemarau', 100)->nullable();
            $table->string('kecukupan_hujan', 100)->nullable();
            $table->text('solusi_kekurangan_air')->nullable();
            $table->string('sistem_pembagian_air', 255)->nullable();
            $table->string('panjang_saluran_primer', 50)->nullable();
            $table->string('panjang_saluran_sekunder', 50)->nullable();
            $table->string('panjang_saluran_tersier', 50)->nullable();
            $table->string('kondisi_permanen', 50)->nullable();
            $table->string('kondisi_tidak_permanen', 50)->nullable();
            $table->string('kondisi_tembuku_arya', 100)->nullable();
            $table->string('kondisi_tembuku_gede', 100)->nullable();
            $table->string('kondisi_tembuku_pemaron', 100)->nullable();
            $table->string('keberadaan_sampah', 255)->nullable();
            $table->string('pencemaran_ternak', 255)->nullable();
            $table->string('pencemaran_industri', 255)->nullable();
            $table->string('penggunaan_non_pertanian', 255)->nullable();
            $table->string('pola_tanam', 100)->nullable();
            $table->string('intensitas_tanam', 100)->nullable();
            $table->string('alih_fungsi_1_tahun', 100)->nullable();
            $table->string('peruntukan_1_tahun', 255)->nullable();
            $table->string('alih_fungsi_5_tahun', 100)->nullable();
            $table->string('peruntukan_5_tahun', 255)->nullable();
            $table->string('produktivitas_padi', 100)->nullable();
            $table->string('varietas', 100)->nullable();
            $table->string('diversifikasi_tanaman', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subaks');
    }
};
