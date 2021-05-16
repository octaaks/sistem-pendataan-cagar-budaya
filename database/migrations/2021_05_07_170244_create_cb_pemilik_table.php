<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCbPemilikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cb_pemilik', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cb_identitas_id')->unsigned();
        
            $table->string('nama');
            $table->string('nik');
            $table->string('no_hp');
            $table->string('email');
            $table->string('alamat');

            $table->timestamps();
            $table->softDeletes();
                
            $table->foreign('cb_identitas_id')->references('id')->on('cb_identitas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cb_pemilik');
    }
}