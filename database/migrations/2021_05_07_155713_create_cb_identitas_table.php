<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCbIdentitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cb_identitas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama');
            $table->string('no_sertifikat');
            $table->string('nop_pbb');
            $table->string('alamat');
            $table->string('url_gambar');
            $table->string('luas');
            $table->string('batas');
            $table->string('koordinat');
            
            $table->softDeletes();
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
        Schema::dropIfExists('cb_identitas');
    }
}