<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prokers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->enum('is_registration_open', [0, 1])->default(0)->comment = "0 Not Open, 1 Open";
            $table->enum('status', [0, 1])->default(0)->comment = "0 Tidak Aktif, 1 Aktif";
            $table->string('link_registration')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_storage_document')->nullable();
            $table->string('link_storage_certificate')->nullable();
            $table->string('link_storage_pdd_documentation')->nullable();
            $table->string('link_contact_person')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prokers');
    }
}
