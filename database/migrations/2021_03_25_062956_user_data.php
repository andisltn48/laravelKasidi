<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('nama',30)->nullable();
            $table->integer('nim')->nullable();
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('prodi',30)->nullable();
            $table->string('jurusan',30)->nullable();
            $table->string('saldo',30)->nullable();
            $table->string('task',30)->nullable();
            $table->string('foto',30)->nullable();
            $table->foreignId('user_id')->constrained('users')->ondelete('cascade');
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
        Schema::drop('user_data');
    }
}
