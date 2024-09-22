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
        Schema::create('pemilu_vote', function (Blueprint $table) {
            $table->id(); 
            $table->string('nim', 20)->unique(); 
            $table->string('token', 64); 
            $table->tinyInteger('vote_status')->default(0); // 0 = belum vote, 1, 2, 3, etc. untuk kandidat
            $table->tinyInteger('email_status')->default(0)->comment('0 = belum, 1 = terkirim, 2 = gagal');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilu_vote');
    }
};
