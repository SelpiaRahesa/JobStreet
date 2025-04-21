<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user', 'nama', 'jenis_kelamin', 'telepon', 'alamat', 'pendidikan_terakhir', 'kelebihan', 'pengalaman', 'posisi', 'id_bidang'
    ];

     // Relasi dengan job_postings
    // public function jobPostings()
    // {
    //     return $this->belongsTo(Job_posting::class, 'id_JobPost');
    // }
}
