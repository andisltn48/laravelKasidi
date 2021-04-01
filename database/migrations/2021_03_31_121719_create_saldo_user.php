<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user_data');  //JOB KIRIM SEMUA
            $table->integer('harga')->nullable();
            $table->string('keterangan_task',255)->nullable();
            $table->date('batas_pembayaran')->nullable();
            $table->enum('status', ['LUNAS', 'BELUM LUNAS'])->nullable();
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
        Schema::dropIfExists('saldo_user');
    }
}
