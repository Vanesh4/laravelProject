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
        Schema::create('asociados', function (Blueprint $table) {
            $table->bigInteger('cedula')->primary();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('distrito_id');
            $table->string('direccion');
            $table->integer('ciudad_id');
            $table->boolean('estado')->default(true);
            $table->bigInteger('celular');
            $table->string('email');
            $table->text('observacion_familia')->nullable();
            $table->text('observacion')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asociados');
    }
};
