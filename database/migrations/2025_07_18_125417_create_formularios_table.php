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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('cedula')->unique();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->enum('ciudad',['Bogotá', 'Medellín', 'Cali', 'Barranquilla', 'Cartagena'])->nullable();
            $table->string('celular', 10)->nullable();
            $table->date('fecha_inicial');
            $table->date('fecha_final');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
