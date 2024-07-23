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
        Schema::create('form_angkutans', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor');
            $table->string('nama_driver');
            $table->string('nama_rute');
            $table->enum('opsi', ['keberangkatan', 'kedatangan']);
            $table->enum('sesi', ['sesi 1', 'sesi 2']);
            $table->integer('jumlah_penumpang');
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('form_angkutans');
    }
};
