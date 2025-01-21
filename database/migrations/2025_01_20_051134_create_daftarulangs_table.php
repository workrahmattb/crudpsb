<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftarulangs', function (Blueprint $table) {
            $table->id();

            $table->string('nama')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('nik')->nullable();
            $table->string('kk')->nullable();
            $table->string('namakk')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nis')->nullable();
            $table->string('tk')->nullable();
            $table->string('paud')->nullable();
            $table->string('hobi')->nullable();
            $table->string('citacita')->nullable();
            $table->string('anakke')->nullable();
            $table->string('jumlahsaudara')->nullable();
            $table->string('tglmasuk')->nullable();
            $table->string('kks')->nullable();
            $table->string('pkh')->nullable();
            $table->string('kip')->nullable();

            $table->string('jenjangpendidikansebelumnya')->nullable();
            $table->string('statussekolahsebelumnya')->nullable();
            $table->string('namasekolahsebelumnya')->nullable();
            $table->string('npsnsekolahsebelumnya')->nullable();
            $table->string('alamatsekolahsebelumnya')->nullable();
            $table->string('kecamatansekolahsebelumnya')->nullable();
            $table->string('kabupatensekolahsebelumnya')->nullable();
            $table->string('provinsisekolahsebelumnya')->nullable();

            $table->string('nikayah')->nullable();
            $table->string('namaayah')->nullable();
            $table->string('tempatlahirayah')->nullable();
            $table->date('tanggallahirayah')->nullable();
            $table->string('statusayah')->nullable();
            $table->string('nohpayah')->nullable();
            $table->string('pendidikanayah')->nullable();
            $table->string('pekerjaanayah')->nullable();
            $table->string('penghasilanayah')->nullable();

            $table->string('nikibu')->nullable();
            $table->string('namaibu')->nullable();
            $table->string('tempatlahiribu')->nullable();
            $table->date('tanggallahiribu')->nullable();
            $table->string('statusibu')->nullable();
            $table->string('nohpibu')->nullable();
            $table->string('pendidikanibu')->nullable();
            $table->string('pekerjaanibu')->nullable();
            $table->string('penghasilanibu')->nullable();

            $table->string('statusmilik')->nullable();
            $table->string('alamatrumahtinggal')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kodepos')->nullable();

            $table->string('nikwali')->nullable();
            $table->string('namawali')->nullable();
            $table->string('tempatlahirwali')->nullable();
            $table->date('tanggallahirwali')->nullable();
            $table->string('nohpwali')->nullable();
            $table->string('pendidikanwali')->nullable();
            $table->string('pekerjaanwali')->nullable();
            $table->string('penghasilanwali')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftarulangs');
    }
};
