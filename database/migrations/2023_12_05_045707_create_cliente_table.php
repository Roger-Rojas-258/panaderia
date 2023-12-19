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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('ci', 30)->nullable(true);
            $table->string('nombre', 40)->nullable(false);
            $table->string('paterno', 40)->nullable(false);
            $table->string('materno', 40)->nullable(true);
            $table->char('sexo', 1)->nullable(true);
            $table->string('telefono')->nullable(true);
            $table->date('fecha_nacimiento')->nullable(true);
            $table->unsignedBigInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
