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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('evidencia_id');
            $table->foreign('evidencia_id')->references('id')->on('evidencias')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('estudiante_id')->on('evidencias')->onDelete('cascade');

            $table->text('contenido');
            $table->enum('tipo',[ 'feedback', 'pregunta', 'sugerencia']);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
