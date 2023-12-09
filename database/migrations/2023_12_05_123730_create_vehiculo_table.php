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
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->string('placa')->primary();
            $table->string('modelo', 40);
            $table->string('marca', 40);
            $table->string('color', 40);
            $table->string('estado_uso', 20);
            $table->unsignedBigInteger('id_tipoVehiculo')->nullable(false);
            $table->unsignedBigInteger('estado')->default(1)->nullable(false);
            $table->timestamps();
            $table->foreign('id_tipoVehiculo')->references('id_tipoVehiculo')->on('tipo_vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};
