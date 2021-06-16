<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class transaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama',40);
            $table->integer('jumlah_saldo')->nullable();
            $table->enum('jenis_pembayaran', ['Top-up', 'Pembayaran','Transfer'])->nullable();
            $table->enum('status', ['Konfirmasi', 'Belum Terkonfirmasi'])->nullable();
            $table->string('keterangan',250);
            $table->string('bukti_pembayaran',250);
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
        Schema::drop('transaksi');
    }
}
