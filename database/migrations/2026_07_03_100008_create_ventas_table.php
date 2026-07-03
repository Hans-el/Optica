<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_venta')->unique();

            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->restrictOnDelete();

            $table->foreignId('user_id')
                ->comment('vendedor que registró la venta')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('receta_id')
                ->nullable()
                ->constrained('recetas')
                ->nullOnDelete();

            $table->dateTime('fecha_venta');

            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('impuesto', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);

            $table->enum('metodo_pago', ['efectivo', 'tarjeta', 'transferencia', 'mixto'])
                ->default('efectivo');

            $table->enum('estado', ['pendiente', 'pagada', 'cancelada'])
                ->default('pendiente');

            $table->text('notas')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
