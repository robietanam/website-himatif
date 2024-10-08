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
        
        Schema::dropIfExists('form_cakaps');
        Schema::create('form_cakaps', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->mediumText('bukti_pendaftaran');
            $table->string('id_form');
            $table->string('label_id');
            $table->enum('status', [0, 1, 2])->default(2)->comment = "0 Belum Dikirim, 1 Sudah Dikirim, 2 Tidak dapat kode / Error";
            $table->timestamps();
            $table->unsignedBigInteger('cakap_kode_id')->nullable();
            $table  ->foreign('cakap_kode_id')
                    ->references('id')->on('cakap_kodes')
                    ->nullable();
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
