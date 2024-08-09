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
        Schema::create('simpan_penumpang_umums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobil2_id'); // Tambahkan kolom mobil_id
            $table->string('nama_penumpang');
            $table->string('alamat_penumpang');
            $table->timestamps();

            $table->foreign('mobil2_id')->references('id')->on('plat_nomors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simpan_penumpang_umums');
    }
};
