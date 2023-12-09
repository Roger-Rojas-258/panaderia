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
        Schema::create('rol_privilegio', function (Blueprint $table) {
            $table->id('id_rolprivilegio');
            $table->unsignedBigInteger('id_rol')->nullable(false);
            $table->unsignedBigInteger('id_privilegio')->nullable(false);
            $table->timestamps();
            $table->foreign('id_rol')->references('id_rol')->on('rol');
            $table->foreign('id_privilegio')->references('id_privilegio')->on('privilegio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rol_privilegio');
    }
};