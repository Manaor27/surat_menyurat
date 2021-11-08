<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable();
            $table->string('status');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_surat');
            $table->foreign('id_surat')->references('id')->on('surat')->onDelete('CASCADE');
            $table->unsignedBigInteger('id_pejabat')->nullable();
            $table->foreign('id_pejabat')->references('id')->on('tanda_tangan')->onDelete('CASCADE');
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
        Schema::dropIfExists('informasi');
    }
}
