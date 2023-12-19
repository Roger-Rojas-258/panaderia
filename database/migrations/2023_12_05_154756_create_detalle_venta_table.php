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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('id_detalleventa');
            $table->unsignedBigInteger('cantidad');
            $table->decimal('sub_total', 8, 2);
            $table->unsignedBigInteger('id_productooferta')->nullable(false);
            $table->unsignedBigInteger('id_venta')->nullable(false);
            $table->timestamps();
            $table->foreign('id_productooferta')->references('id_productooferta')->on('producto_ofertadia');
            $table->foreign('id_venta')->references('id_venta')->on('nota_venta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};