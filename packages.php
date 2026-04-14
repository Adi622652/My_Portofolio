<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subak extends Model
{
    use HasFactory;

    protected $table = 'subaks';

    protected $fillable = [
        'nama',
        'slug',
        'kabupaten',
        'kecamatan',
        'desa',
        'luas_subak',
        'batas_timur',
        'batas_barat',
        'batas_utara',
        'batas_selatan',
        'jumlah_anggota',
        'nama_pekaseh',
        'no_telp',
        'sumber_air',
        'kecukupan_kemarau',
        'kecukupan_hujan',
        'solusi_kekurangan_air',
        'sistem_pembagian_air',
        'panjang_saluran_primer',
        'panjang_saluran_sekunder',
        'panjang_saluran_tersier',
        'kondisi_permanen',
        'kondisi_tidak_permanen',
        'kondisi_tembuku_arya',
        'kondisi_tembuku_gede',
        'kondisi_tembuku_pemaron',
        'keberadaan_sampah',
        'pencemaran_ternak',
        'pencemaran_industri',
        'penggunaan_non_pertanian',
        'pola_tanam',
        'intensitas_tanam',
        'alih_fungsi_1_tahun',
        'peruntukan_1_tahun',
        'alih_fungsi_5_tahun',
        'peruntukan_5_tahun',
        'produktivitas_padi',
        'varietas',
        'diversifikasi_tanaman',
        'foto',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subak) {
            if (empty($subak->slug)) {
                $subak->slug = Str::slug($subak->nama);
            }
        });

        static::updating(function ($subak) {
            if ($subak->isDirty('nama') && empty($subak->slug)) {
                $subak->slug = Str::slug($subak->nama);
            }
        });
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            // Check if the file exists in the public directory (for static/pre-loaded images)
            if (file_exists(public_path('images/subak/' . basename($this->foto)))) {
                return asset('images/subak/' . basename($this->foto));
            }
            return asset('storage/' . $this->foto);
        }
        return null;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
