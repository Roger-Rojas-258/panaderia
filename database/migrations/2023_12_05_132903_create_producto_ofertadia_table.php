<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producto_ofertadia', function (Blueprint $table) {
            $table->unsignedBigInteger('id_producto')->nullable(false);
            $table->unsignedBigInteger('id_oferta')->nullable(false);
            $table->integer('stock');
            $table->timestamps();
            $table->id('id_productooferta');
            $table->foreign('id_producto')->references('id_producto')->on('producto');
            $table->foreign('id_oferta')->references('id_oferta')->on('ofertadia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_ofertadia');
    }
};