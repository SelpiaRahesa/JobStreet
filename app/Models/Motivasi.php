<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivasi extends Model
{
    use HasFactory;
    protected $fillable = ['id','judul', 'deskripsi', 'image'];
    protected $visible = ['id','judul', 'deskripsi', 'image'];
}
