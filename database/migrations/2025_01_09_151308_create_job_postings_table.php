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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemberi_kerja');
            $table->string('judul');
            $table->unsignedBigInteger('id_bidang');
            $table->unsignedBigInteger('id_jenis');
            $table->integer('rentang_gaji');
            $table->unsignedBigInteger('id_lokasi');
            $table->text('deskripsi');
            $table->boolean('status')->default(false); // default false (tidak diterima)
            $table->timestamps();
            $table->foreign('id_pemberi_kerja')->references('id')->on('pemberi_kerjas')->onDelete('cascade');
            $table->foreign('id_bidang')->references('id')->on('bidangs')->onDelete('cascade');
            $table->foreign('id_jenis')->references('id')->on('jenis_pekerjaans')->onDelete('cascade');
            $table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_postings');
    }
};
