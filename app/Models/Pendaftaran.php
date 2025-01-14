<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama',
        'jenjangpendidikan',
        'alamat',
        'sekolahasal',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'nohp',
        'buktitransfer',
    ];
}
