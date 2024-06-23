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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fakultas_id')->constrained('fakultases');
            $table->string('nama_pegawai');
            $table->string('nip');
            $table->string('unit_kerja');
            $table->string('fungsional');
            $table->string('tugas_tambahan');
            $table->string('s1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('gambar')->default('{{ asset(assets/img/admin.jpg) }}');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
