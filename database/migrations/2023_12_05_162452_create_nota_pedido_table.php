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
        Schema::create('nota_pedido', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->dateTime('fecha');
            $table->decimal('total_precio', 8, 2);
            $table->decimal('costo_envio', 5, 2);
            $table->float('tiempo_estimado');
            $table->string('estado_entrega', 50);
            $table->unsignedBigInteger('id_cliente')->nullable(false);
            $table->unsignedBigInteger('id_ubicacion')->nullable(false);
            $table->unsignedBigInteger('id_repartidorvehiculo')->nullable(false);
            $table->unsignedBigInteger('id_pago')->nullable(false);
            $table->timestamps();
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicacion');
            $table->foreign('id_repartidorvehiculo')->references('id_repartidorvehiculo')->on('repartidor_vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_pedido');
    }
};