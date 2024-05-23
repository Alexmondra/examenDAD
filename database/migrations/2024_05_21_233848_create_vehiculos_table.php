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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->string('placa', 15)->unique();
            $table->string('modelo', 70); 
            $table->string('propietario');
            $table->timestamps();
            
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
