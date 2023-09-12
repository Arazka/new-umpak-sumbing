<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePariwisataKawasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pariwisata_kawasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kawasan_id');
            $table->foreign('kawasan_id')->references('id')->on('kawasans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('foto');
            $table->string('nama_wisata');
            $table->text('deskripsi');
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
        Schema::dropIfExists('pariwisata_kawasans');
    }
}
