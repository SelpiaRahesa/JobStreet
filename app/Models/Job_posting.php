<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_posting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_perusahaan',
        'judul',
        'id_bidang',
        'id_jenis',
        'rentang_gaji',
        'id_lokasi',
        'deskripsi',
        'kualifikasi',
        'status',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }

    public function jenisPekerjaan()
    {
        return $this->belongsTo(Jenis_pekerjaan::class, 'id_jenis');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
}
