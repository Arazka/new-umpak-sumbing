<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilLembagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_lembagas', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['bkad', 'bumdesma']);
            $table->text('sejarah');
            $table->text('visi_dan_misi');
            $table->text('tugas_dan_fungsi');
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
        Schema::dropIfExists('profil_lembagas');
    }
}
