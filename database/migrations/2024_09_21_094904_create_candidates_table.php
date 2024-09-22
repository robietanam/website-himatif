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
        Schema::create('pemilu_candidates', function (Blueprint $table) {
            $table->id(); // Auto-incremented primary key
            $table->string('nama'); // Candidate's name
            $table->string('nim', 20)->unique(); // Candidate's unique NIM
            $table->string('photo'); // Visi as an array of strings
            $table->longText('visi'); // Visi as an array of strings
            $table->json('misi'); // Misi as an array of strings
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilu_candidates');
    }
};
