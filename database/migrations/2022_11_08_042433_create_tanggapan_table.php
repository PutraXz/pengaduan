<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->integer('kode')->unsigned();;
            $table->primary('kode');
            $table->text('tanggapan');
            $table->date('tanggal');
            $table->unsignedBigInteger('kode_pengaduan');
            // $table->foreign('kode_pengaduan')->references('kode')->on('pengaduan')->onDelete('cascade');
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
        Schema::dropIfExists('tanggapan');
    }
}
