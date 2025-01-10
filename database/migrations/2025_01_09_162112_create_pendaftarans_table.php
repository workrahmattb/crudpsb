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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->nullable;
            $table->string('nama')->nullable;
            $table->string('jenjangpendidikan')->nullable;
            $table->string('alamat')->nullable;
            $table->string('sekolahasal')->nullable;
            $table->string('tempat_lahir')->nullable;
            $table->date('tanggal_lahir')->nullable;
            $table->string('nama_ayah')->nullable;
            $table->string('nama_ibu')->nullable;
            $table->string('nama_wali')->nullable;
            $table->string('nohp')->nullable;
            $table->string('buktitransfer')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
