<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suket', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('kepada');
            $table->string('keterangan');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('tempat');
            $table->unsignedbigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('suket');
    }
}
