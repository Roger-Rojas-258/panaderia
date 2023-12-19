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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usuario')->unique();
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('id_rol')->nullable(false);
            $table->unsignedBigInteger('id_cliente')->nullable(true);
            $table->unsignedBigInteger('id_repartidor')->nullable(true);
            $table->unsignedBigInteger('id_empleado')->nullable(true);
            $table->unsignedBigInteger('estado')->default(1)->nullable(false);

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_rol')->references('id_rol')->on('rol');
            $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
            $table->foreign('id_repartidor')->references('id_repartidor')->on('repartidor');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
