<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jobPostings()
{
    return $this->hasMany(Job_posting::class, 'id_perusahaan');
}


}
