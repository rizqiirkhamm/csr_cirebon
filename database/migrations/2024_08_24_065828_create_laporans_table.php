<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_user');
            $table->integer('id_sektor')->unsigned();
            $table->integer('id_program')->unsigned();
            $table->integer('id_proyek')->unsigned()->nullable();
            $table->string('judul_laporan');
            $table->integer('tanggal');
            $table->enum('bulan', ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember']);
            $table->integer('tahun');
            $table->integer('realisasi');
            $table->text('deskripsi')->nullable();
            $table->string('thumbnail')->default('images/thumbnail.png')->change();
            $table->json('images')->nullable(); // Tambahkan kolom ini untuk menyimpan multiple images
            $table->enum('status', ['pending', 'revisi', 'tolak', 'terbit'])->default('pending');
            $table->text('pesan_admin')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sektor')->references('id')->on('sektors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_program')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_proyek')->references('id')->on('proyeks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};