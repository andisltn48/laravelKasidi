<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user_data')->ondelete('cascade');  //JOB KIRIM SEMUA
            $table->string('nama_task',30)->nullable();
            $table->string('jenis_task',30)->nullable();
            $table->integer('harga')->nullable();
            $table->string('keterangan_task',255)->nullable();
            $table->date('batas_pembayaran')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
