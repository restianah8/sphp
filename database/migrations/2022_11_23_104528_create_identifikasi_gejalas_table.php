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
        Schema::create('identifikasi_gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_identifikasi')->constrained('identifikasi')->cascadeOnDelete();
            $table->foreignId('id_penyakit')->constrained('penyakit')->cascadeOnDelete();
            $table->smallInteger('persentase');
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
        Schema::dropIfExists('identifikasi_gejala');
    }
};
