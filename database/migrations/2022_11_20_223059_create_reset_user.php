<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResetUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reset_user', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('nim')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('prodi')->nullable();
            $table->string('status')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('email')->nullable();
            $table->boolean('selesai')->default(false);
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
        Schema::dropIfExists('reset_user');
    }
}
