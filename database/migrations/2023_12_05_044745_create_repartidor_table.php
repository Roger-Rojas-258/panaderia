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
        Schema::create('repartidor', function (Blueprint $table) {
            $table->id('id_repartidor');
            $table->string('ci', 30);
            $table->string('nombre', 40)->nullable(false);
            $table->string('paterno', 40)->nullable(false);
            $table->string('materno', 40);
            $table->char('sexo', 1);
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->decimal('total_propina', 8, 2);
            $table->string('imagen', 250)->nullable(true);
            $table->unsignedBigInteger('estado')->default(1)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repartidor');
    }
};
