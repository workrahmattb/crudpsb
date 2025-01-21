<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarulang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tempatlahir',
        'tanggallahir',
        'nik',
        'kk',
        'namakk',
        'nisn',
        'nis',
        'tk',
        'paud',
        'hobi',
        'citacita',
        'anakke',
        'jumlahsaudara',
        'tglmasuk',
        'kks',
        'pkh',
        'kip',
        'jenjangpendidikansebelumnya',
        'statussekolahsebelumnya',
        'namasekolahsebelumnya',
        'npsnsekolahsebelumnya',
        'alamatsekolahsebelumnya',
        'kecamatansekolahsebelumnya',
        'kabupatensekolahsebelumnya',
        'provinsisekolahsebelumnya',
        'nikayah',
        'namaayah',
        'tempatlahirayah',
        'tanggallahirayah',
        'statusayah',
        'nohpayah',
        'pendidikanayah',
        'pekerjaanayah',
        'penghasilanayah',
        'nikibu',
        'namaibu',
        'tempatlahiribu',
        'tanggallahiribu',
        'statusibu',
        'nohpibu',
        'pendidikanibu',
        'pekerjaanibu',
        'penghasilanibu',
        'statusmilik',
        'alamatrumahtinggal',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kodepos',
        'nikwali',
        'namawali',
        'tempatlahirwali',
        'tanggallahirwali',
        'statuswali',
        'nohpwali',
        'pendidikanwali',
        'pekerjaanwali',
        'penghasilanwali',

    ];
}
