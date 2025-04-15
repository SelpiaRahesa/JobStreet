<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $fillable = ['id','lokasi'];
    protected $visible = ['id','lokasi'];

    public function Job_posting()
{
    return $this->hasMany(Job_posting::class, 'lokasi_id');

}
}
