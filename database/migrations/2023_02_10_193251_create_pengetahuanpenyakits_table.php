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
        Schema::create('pengetahuanpenyakit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penyakit')->nullable();
            $table->unsignedBigInteger('id_gejalapenyakit')->nullable();
            $table->decimal('bobot', 2, 1);

            $table->timestamps();
            $table->foreign('id_penyakit')->references('id')->on('penyakit')
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->foreign('id_gejalapenyakit')->references('id')->on('gejalapenyakit')
                ->onUpdate('no action')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengetahuanpenyakit');
    }
};
