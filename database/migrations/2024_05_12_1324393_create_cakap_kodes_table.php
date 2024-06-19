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
        
        Schema::dropIfExists('cakap_kodes');
        Schema::dropIfExists('form_cakaps');
        Schema::create('cakap_kodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_cakap_id')->nullable();
            $table->string('kode')->unique();
            $table->timestamps();

            $table->unsignedBigInteger('label_id')->nullable();
            $table->foreign('label_id')->references('id')->on('label_cakaps')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cakap_kodes');
    }
};
