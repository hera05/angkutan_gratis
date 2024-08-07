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
        Schema::create('plat_nomors', function (Blueprint $table) {
            $table->id();
            $table->string('merek_mobil');
            $table->string('plat_nomor')->unique();
            $table->string('no_stnk')->unique();
            $table->enum('status_pajak', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');
            $table->enum('uji_kir', ['Sudah', 'Belum'])->default('Belum');
            $table->integer('jumlah_kursi')->nullable();
            $table->unsignedBigInteger('user_id'); // Tambahkan kolom user_id
            $table->unsignedBigInteger('rute_id'); // Tambahkan kolom rute_id
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rute_id')->references('id')->on('rutes')->onDelete('cascade'); // Foreign key constraint untuk rute_id

        });
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plat_nomors');
    }
};
