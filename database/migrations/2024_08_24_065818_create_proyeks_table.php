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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sektor')->unsigned();
            $table->integer('id_program')->unsigned();
            $table->string('nama_proyek');
            $table->enum('lokasi', ['Harjamukti', 'Lemahwungkuk', 'Pekalipan', 'Kejaksan', 'Kesambi']);
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->text('deskripsi');
            $table->string('foto_proyek')->default('thumbnail.png');
            $table->foreign('id_sektor')->references('id')->on('sektors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_program')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
