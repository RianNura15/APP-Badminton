<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaLapangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nama_lapangan', function (Blueprint $table) {
            $table->id('id_lapangan');
            $table->string('nama_lap')->nullable();
            $table->foreignId('jenis_id')->nullable()->constrained('jenis_lapangan', 'id_jenis')->onUpdate('cascade')
      ->onDelete('cascade');
            $table->integer('harga')->nullable();
            $table->string('gambar')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('det_lapangan')->nullable();
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
        Schema::dropIfExists('nama_lapangan');
    }
}
