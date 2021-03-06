<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceInfrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_infras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('infra_id')->references('id')->on('infras');
            $table->text('sparepart')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('lama')->nullable();
            $table->text('alasan')->nullable();
            $table->string('file')->nullable();
            $table->enum('status',['tolak','batal','pengajuan','selesai','tidak'])->default('pengajuan');
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
        Schema::dropIfExists('service_infras');
    }
}
