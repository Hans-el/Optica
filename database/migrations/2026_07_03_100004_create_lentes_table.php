<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lentes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('marca_id')
                ->constrained('marcas')
                ->restrictOnDelete();

            $table->foreignId('categoria_id')
                ->constrained('categorias')
                ->restrictOnDelete();

            $table->foreignId('proveedor_id')
                ->nullable()
                ->constrained('proveedores')
                ->nullOnDelete();

            $table->string('nombre');
            $table->string('sku')->unique();
            $table->text('descripcion')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->enum('genero', ['hombre', 'mujer', 'unisex', 'nino'])->nullable();

            $table->decimal('precio', 10, 2);
            $table->decimal('costo', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('stock_minimo')->default(5);

            $table->string('imagen')->nullable();
            $table->boolean('activo')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lentes');
    }
};
