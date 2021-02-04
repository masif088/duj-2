<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('barang_id')->references('id')->on('barangs');
            $table->foreignId('gudang_id')->references('id')->on('gudangs');
            $table->foreignId('suplier_id')->references('id')->on('supliers');
            $table->string('kode_barang');
            $table->string('kondisi');
            $table->enum('status',['pindah','terjual','ready','rusak']);
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
        Schema::dropIfExists('masuks');
    }
}
