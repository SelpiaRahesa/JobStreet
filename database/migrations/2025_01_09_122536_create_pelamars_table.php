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
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->integer('telepon');
            $table->string('alamat');
            $table->string('pendidikan_terakhir');
            $table->text('kelebihan');
            $table->text('pengalaman');
            $table->string('posisi');
            $table->string('cv');
            // $table->unsignedBigInteger('id_jobPost');  // Kolom untuk relasi dengan job_postings
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('id_jobPost')->references('id')->on('job_postings')->onDelete('cascade');  // Relasi dengan job_postings

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelamars');
    }
};
