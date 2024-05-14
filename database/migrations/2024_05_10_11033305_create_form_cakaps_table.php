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
        Schema::create('form_cakaps', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('id_form');
            $table->enum('status', [0, 1, 2])->default(2)->comment = "0 Belum Dikirim, 1 Sudah Dikirim, 2 Tidak dapat kode / Error";
            $table->timestamps();
            $table->string('id_kode')->nullable();
            $table  ->foreign('id_kode')
                    ->references('kode')->on('cakap_kodes')
                    ->nullable()
                    ->unique()
                    ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_cakaps');
    }
};
