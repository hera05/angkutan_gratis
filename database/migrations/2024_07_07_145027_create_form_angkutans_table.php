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
            $table->unsignedBigInteger('petugas_id'); // Tambahkan kolom user_id
            $table->unsignedBigInteger('plat_nomor_id'); // Tambahkan kolom mobil_id
            $table->enum('opsi', ['keberangkatan', 'kedatangan']);
            $table->enum('sesi', ['sesi 1', 'sesi 2']);
            $table->string('gambar')->nullable();
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('petugas_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plat_nomor_id')->references('id')->on('plat_nomors')->onDelete('cascade');
            
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
