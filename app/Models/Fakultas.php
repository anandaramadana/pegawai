<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultases';
    protected $guards = [];
    protected $fillable=['id','nama_fakultas','gambar'];

    public function fakultas()
    {
        return $this->hasMany(Pegawai::class, 'fakultas_id');
    }
}
