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
        Schema::create('simpan_penumpangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobil1_id'); // Tambahkan kolom mobil_id
            $table->unsignedBigInteger('penumpang_id'); // Tambahkan kolom mobil_id
            $table->timestamps();

            $table->foreign('mobil1_id')->references('id')->on('plat_nomors')->onDelete('cascade');
            $table->foreign('penumpang_id')->references('id')->on('data_pelajars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simpan_penumpangs');
    }
};
