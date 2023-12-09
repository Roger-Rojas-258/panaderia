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
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id('id_detallepedido');
            $table->unsignedBigInteger('id_oferta')->nullable(false);
            $table->unsignedBigInteger('id_pedido')->nullable(false);
            $table->unsignedBigInteger('cantidad');
            $table->decimal('sub_total', 8, 2);
            $table->timestamps();
            
            // Cambiado a 'id_oferta' para que coincida con la columna en la tabla 'producto_ofertadia'.
            $table->foreign('id_oferta')->references('id_oferta')->on('producto_ofertadia');
            
            // Cambiado a 'id_pedido' para que coincida con la columna en la tabla 'nota_pedido'.
            $table->foreign('id_pedido')->references('id_pedido')->on('nota_pedido');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedido');
    }
};