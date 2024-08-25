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
        Schema::create('laporans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sektor')->unsigned();
            $table->integer('id_program')->unsigned();
            $table->integer('id_proyek')->unsigned()->nullable();
            $table->string('judul_laporan');
            $table->integer('tanggal');
            $table->enum('bulan', ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember']);
            $table->integer('tahun');
            $table->integer('realisasi');
            $table->text('deskripsi')->nullable();
            $table->string('thumbnail')->default('thumbnail.png');
            $table->enum('status', ['tolak', 'revisi', 'pending', 'terbit'])->default('pending');
            $table->foreign('id_sektor')->references('id')->on('sektors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_program')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_proyek')->references('id')->on('proyeks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
