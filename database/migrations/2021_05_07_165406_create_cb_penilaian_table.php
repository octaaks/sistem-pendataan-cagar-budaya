<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCbPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cb_penilaian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cb_identitas_id')->unsigned();
            
            $table->string('nilai_penting');
            $table->string('dasar_rekomendasi');
            $table->string('penjelasan_tambahan');

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
        Schema::dropIfExists('cb_penilaian');
    }
}