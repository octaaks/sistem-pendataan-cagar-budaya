<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCbDeskripsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cb_deskripsi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cb_identitas_id')->unsigned();
            
            $table->string('deskripsi');
            $table->string('latar_belakang_sejarah');
            $table->string('riwayat_penanganan');
            $table->string('status_hukum');
            $table->string('kepemilikan');
            $table->string('kondisi');

            $table->timestamps();
                    
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
        Schema::dropIfExists('cb_deskripsi');
    }
}