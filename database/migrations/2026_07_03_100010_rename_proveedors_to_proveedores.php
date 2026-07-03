<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Solo renombra si existe la tabla mal nombrada y la correcta aún no existe
        if (Schema::hasTable('proveedors') && ! Schema::hasTable('proveedores')) {
            Schema::rename('proveedors', 'proveedores');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('proveedores') && ! Schema::hasTable('proveedors')) {
            Schema::rename('proveedores', 'proveedors');
        }
    }
};
