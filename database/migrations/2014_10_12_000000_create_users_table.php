<?php

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
            $table->id();
            $table->string('nim');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('ttl')->nullable();
            $table->string('prodi')->nullable();
            $table->string('status')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('role')->default('USER');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
