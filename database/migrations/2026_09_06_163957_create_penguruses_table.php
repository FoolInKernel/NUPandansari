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
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->string('organisasi'); // Contoh: NU, Muslimat, Fatayat, GP Ansor
            $table->string('tipe'); // Contoh: pimpinan, anggota
            $table->string('jabatan');
            $table->string('nama');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};
