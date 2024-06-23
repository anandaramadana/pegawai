<?php

namespace App\Models;

use App\Models\Fakultas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'dosens';
    protected $guards = [];
    protected $fillable=['id','fakultas_id','nama_pegawai','nip','unit_kerja','fungsional','golongan','tugas_tambahan','s1','s2','s3','email','no_hp','gambar'];

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
