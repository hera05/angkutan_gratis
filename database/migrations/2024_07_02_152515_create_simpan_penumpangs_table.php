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
            $table->string('tanggal');
            $table->string('nama_penumpang');
            $table->string('alamat_penumpang');
            $table->string('jenis_penumpang');
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
        Schema::dropIfExists('simpan_penumpangs');
    }
};
