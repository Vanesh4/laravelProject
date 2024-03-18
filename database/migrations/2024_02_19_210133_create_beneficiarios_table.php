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
        //[Corpentunida_Emp010].[dbo].[CoMae_ExRelPar]
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->bigInteger('cedula');
            $table->string('nombre');
            $table->string('parentezco');
            $table->bigInteger('cedulaAsociado');
            $table->date('fechaNacimiento');
            $table->date('fechaIngreso');
            $table->timestamps();
            $table->foreign('cedulaAsociado')->references('cedula')->on('asociados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
