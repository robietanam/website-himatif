<?php

use App\Constant\GlobalConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nim')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->enum('position', GlobalConstant::DIVISION_POSITION_NAME)->nullable();
            $table->enum('status', [0, 1])->comment = "0 Tidak Aktif, 1 Aktif";
            $table->year('year_entry')->nullable(); // angkatan
            $table->timestamps();
            $table->rememberToken();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();

            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('set null');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
