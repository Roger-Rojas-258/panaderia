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
        Schema::create('nota_venta', function (Blueprint $table) {
            $table->id('id_venta');
            $table->datetime('fecha'); // formato: "YYYY-MM-DD HH:MM:SS".
            $table->decimal('total_precio', 8, 2)->nullable(false);
            $table->unsignedBigInteger('id_cliente')->nullable(false);
            $table->unsignedBigInteger('id_empleado')->nullable(false);
            $table->unsignedBigInteger('id_pago')->nullable(false);
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleado');
            $table->foreign('id_pago')->references('id_pago')->on('tipo_pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_venta');
    }
};
