<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->id();
            $table->string('merek_mobil');
            $table->string('no_stnk')->unique();
            $table->enum('status_pajak', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');
            $table->enum('uji_kir', ['Sudah', 'Belum'])->default('Belum');
            $table->integer('jumlah_kursi')->nullable();
            $table->unsignedBigInteger('user_id'); // Tambahkan kolom user_id
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobil');
    }
};
