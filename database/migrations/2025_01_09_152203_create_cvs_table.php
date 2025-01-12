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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemberi_kerja');
            $table->unsignedBigInteger('id_pelamar');
            $table->string('image_resume');
            $table->timestamps();
            $table->foreign('id_pemberi_kerja')->references('id')->on('pemberi_kerjas')->onDelete('cascade');
            $table->foreign('id_pelamar')->references('id')->on('pelamars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cvs');
    }
};
