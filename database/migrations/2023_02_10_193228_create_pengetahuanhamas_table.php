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
        Schema::create('pengetahuanhama', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penyakit')->nullable();
            $table->unsignedBigInteger('id_gejalahama')->nullable();
            $table->decimal('bobot', 2, 1);

            $table->timestamps();
            $table->foreign('id_penyakit')->references('id')->on('penyakit')
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->foreign('id_gejalahama')->references('id')->on('gejalahama')
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
        Schema::dropIfExists('pengetahuanhama');
    }
};
