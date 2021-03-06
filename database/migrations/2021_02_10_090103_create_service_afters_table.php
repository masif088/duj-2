<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAftersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_afters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('after_id')->references('id')->on('afters');
            $table->text('sparepart')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('lama')->nullable();
            $table->text('alasan')->nullable();
            $table->string('file')->nullable();
            $table->enum('status',['tolak','pengajuan','selesai','tidak','batal'])->default('pengajuan');
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
        Schema::dropIfExists('service_afters');
    }
}
