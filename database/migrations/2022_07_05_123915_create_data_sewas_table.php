<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sewa', function (Blueprint $table) {
            $table->id('id_sewa');
            $table->foreignId('id_user')->nullable()->constrained('users', 'id')->onUpdate('cascade')
      ->onDelete('cascade');
            $table->foreignId('lap_id')->nullable()->constrained('nama_lapangan', 'id_lapangan')->onUpdate('cascade')
      ->onDelete('cascade');
            $table->foreignId('id_payment')->nullable()->constrained('payment', 'id_payment')->onUpdate('cascade')
      ->onDelete('cascade');
            $table->integer('diskon')->nullable();
            $table->integer('harga')->nullable();
            $table->date('tanggal');
            $table->date('tempo');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->integer('totaljam');
            $table->string('keterangan')->nullable();
            $table->string('konfirmasi')->nullable();
            $table->integer('total');
            $table->string('bukti_tf')->nullable();
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
        Schema::dropIfExists('data_sewa');
    }
}
