<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCetakStickerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_sticker', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_sticker');
            $table->date('masa_berlaku')->nullable();
            $table->string('kode_sticker');
            $table->string('id_mobil');
            $table->string('id_cust');
            $table->string('perusahaan');
            $table->string('status');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('sticker');
    }
}
