<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gudang_id')->references('id')->on('gudangs');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('kode');
            $table->enum('status',['nonaktif','ready','rusak','mutasi','terjual'])->default('nonaktif');
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
        Schema::dropIfExists('infras');
    }
}
