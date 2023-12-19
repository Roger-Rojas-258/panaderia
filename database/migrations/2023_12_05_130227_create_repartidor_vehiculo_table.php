<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repartidor_vehiculo', function (Blueprint $table) {
            $table->id('id_repartidorvehiculo');
            $table->unsignedBigInteger('id_repartidor')->nullable(false);
            $table->string('placa')->nullable(false);
            $table->timestamps();
            $table->foreign('id_repartidor')->references('id_repartidor')->on('repartidor');
            $table->foreign('placa')->references('placa')->on('vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repartidor_vehiculo');
    }
};