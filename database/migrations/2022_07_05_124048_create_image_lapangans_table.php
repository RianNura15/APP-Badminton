<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageLapangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_lapangan', function (Blueprint $table) {
            $table->id('id_image');
            $table->foreignId('lapangan_id')->nullable()->constrained('nama_lapangan', 'id_lapangan')->onUpdate('cascade')
      ->onDelete('cascade');
            $table->string('filename')->nullable();
            $table->string('path')->nullable();
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
        Schema::dropIfExists('image_lapangan');
    }
}
