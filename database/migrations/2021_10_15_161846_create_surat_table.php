<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('perihal');
            $table->string('kepada')->nullable();
            $table->text('keterangan')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->string('tempat')->nullable();
            $table->string('kode')->nullable();
            $table->string('nama')->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('target')->nullable();
            $table->string('tamu')->nullable();
            $table->unsignedbigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedbigInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('CASCADE');
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
        Schema::dropIfExists('surat');
    }
}
