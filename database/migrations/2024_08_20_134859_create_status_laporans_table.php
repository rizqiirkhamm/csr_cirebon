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
        Schema::create('status_laporans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_laporan')->unsigned();
            $table->enum('status', ['rejected', 'revisi', 'accepted']);
            $table->text('alasan')->nullable();
            $table->foreign('id_laporan')->references('id')->on('laporans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_laporans');
    }
};
