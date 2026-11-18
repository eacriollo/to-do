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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('tarea_id')->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion');
            $table->boolean('completada')->default(false);
            $table->enum('prioridad', ['baja', 'media', 'alta'])->default('media');
            $table->date('fecha_vencimiento')->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
