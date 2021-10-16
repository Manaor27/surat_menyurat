<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManajemenSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manajemen_surat', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('manajemen_surat');
    }
}
