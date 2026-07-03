<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->cascadeOnDelete();

            $table->foreignId('optometrista_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->date('fecha_examen');

            // Ojo derecho (OD)
            $table->decimal('od_esfera', 4, 2)->nullable();
            $table->decimal('od_cilindro', 4, 2)->nullable();
            $table->unsignedSmallInteger('od_eje')->nullable();

            // Ojo izquierdo (OI)
            $table->decimal('oi_esfera', 4, 2)->nullable();
            $table->decimal('oi_cilindro', 4, 2)->nullable();
            $table->unsignedSmallInteger('oi_eje')->nullable();

            $table->decimal('adicion', 4, 2)->nullable();
            $table->decimal('distancia_pupilar', 4, 1)->nullable();

            $table->string('diagnostico')->nullable();
            $table->text('observaciones')->nullable();
            $table->date('vigencia_hasta')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
