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
        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre', 40)->nullable(false);
            $table->decimal('precio', 8, 2)->nullable(false);
            $table->string('imagen', 250)->nullable(true);
            $table->unsignedBigInteger('id_tipo')->nullable(false);
            $table->unsignedBigInteger('estado')->nullable(false)->default(1);
            $table->timestamps();
            $table->foreign('id_tipo')->references('id_tipo')->on('tipo_producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
