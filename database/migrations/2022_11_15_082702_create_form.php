<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('nomor')->nullable();
            $table->date('tanggal')->nullable();
            $table->boolean('diwakilkan')->nullable();
            $table->string('surat_kuasa')->nullable();
            $table->string('pengambil')->nullable();
            $table->string('ikatan_dinas')->nullable();
            $table->string('bukti')->nullable();
            $table->string('ttl')->nullable();
            $table->string('keperluan')->nullable();
            $table->string('type');
            $table->string('approve')->nullable();
            $table->string('reason')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('form');
    }
}
