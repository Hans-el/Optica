<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Lente;
use App\Models\Marca;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Seeder;

class OpticaSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario administrador de prueba
        User::firstOrCreate(
            ['email' => 'admin@optica.com'],
            [
                'name' => 'Admin Principal',
                'password' => bcrypt('password'),
                'rol' => 'administrador',
                'telefono' => '0991234567',
                'activo' => true,
            ]
        );

        // Marcas
        $marcas = collect([
            ['nombre' => 'Ray-Ban', 'descripcion' => 'Marca clásica de lentes de sol y oftálmicos'],
            ['nombre' => 'Oakley', 'descripcion' => 'Lentes deportivos y de alto rendimiento'],
            ['nombre' => 'Carrera', 'descripcion' => 'Diseño urbano y deportivo'],
            ['nombre' => 'Persol', 'descripcion' => 'Lentes artesanales italianos'],
        ])->map(fn ($m) => Marca::firstOrCreate(['nombre' => $m['nombre']], $m));

        // Categorías
        $categorias = collect([
            ['nombre' => 'Sol', 'descripcion' => 'Lentes de sol'],
            ['nombre' => 'Oftálmicos', 'descripcion' => 'Lentes con graduación'],
            ['nombre' => 'Deportivos', 'descripcion' => 'Lentes para actividad física'],
        ])->map(fn ($c) => Categoria::firstOrCreate(['nombre' => $c['nombre']], $c));

        // Proveedor
        $proveedor = Proveedor::firstOrCreate(
            ['nombre' => 'Distribuidora Óptica S.A.'],
            [
                'nombre_contacto' => 'Juan Torres',
                'telefono' => '042345678',
                'email' => 'ventas@distopica.com',
                'direccion' => 'Guayaquil, Ecuador',
                'ruc' => '0992345678001',
                'activo' => true,
            ]
        );

        // Lentes (coinciden con los que ya usamos en la vista estática)
        $lentes = [
            [
                'marca' => 'Ray-Ban', 'categoria' => 'Sol',
                'nombre' => 'Ray-Ban Aviator Classic', 'sku' => 'RB-AVI-001',
                'precio' => 120.00, 'costo' => 70.00, 'stock' => 15,
                'material' => 'Metal', 'color' => 'Dorado', 'genero' => 'unisex',
            ],
            [
                'marca' => 'Oakley', 'categoria' => 'Deportivos',
                'nombre' => 'Oakley Holbrook', 'sku' => 'OK-HOL-001',
                'precio' => 150.00, 'costo' => 90.00, 'stock' => 8,
                'material' => 'Acetato', 'color' => 'Negro', 'genero' => 'hombre',
            ],
            [
                'marca' => 'Carrera', 'categoria' => 'Sol',
                'nombre' => 'Carrera Champion', 'sku' => 'CA-CHA-001',
                'precio' => 98.00, 'costo' => 55.00, 'stock' => 20,
                'material' => 'Acetato', 'color' => 'Negro', 'genero' => 'unisex',
            ],
            [
                'marca' => 'Persol', 'categoria' => 'Oftálmicos',
                'nombre' => 'Persol PO3172S', 'sku' => 'PE-317-001',
                'precio' => 210.00, 'costo' => 130.00, 'stock' => 5,
                'material' => 'Acetato', 'color' => 'Carey', 'genero' => 'unisex',
            ],
        ];

        foreach ($lentes as $l) {
            Lente::firstOrCreate(
                ['sku' => $l['sku']],
                [
                    'marca_id' => $marcas->firstWhere('nombre', $l['marca'])->id,
                    'categoria_id' => $categorias->firstWhere('nombre', $l['categoria'])->id,
                    'proveedor_id' => $proveedor->id,
                    'nombre' => $l['nombre'],
                    'descripcion' => "Lente {$l['nombre']} en excelente calidad.",
                    'material' => $l['material'],
                    'color' => $l['color'],
                    'genero' => $l['genero'],
                    'precio' => $l['precio'],
                    'costo' => $l['costo'],
                    'stock' => $l['stock'],
                    'stock_minimo' => 5,
                    'activo' => true,
                ]
            );
        }

        // Clientes
        Cliente::firstOrCreate(
            ['cedula' => '0912345678'],
            [
                'nombre' => 'María', 'apellido' => 'Gómez',
                'telefono' => '0991234567', 'email' => 'maria.gomez@mail.com',
                'direccion' => 'Guayaquil, Ecuador', 'fecha_nacimiento' => '1990-05-14',
                'genero' => 'femenino',
            ]
        );

        Cliente::firstOrCreate(
            ['cedula' => '0923456789'],
            [
                'nombre' => 'Carlos', 'apellido' => 'Pérez',
                'telefono' => '0987654321', 'email' => 'carlos.perez@mail.com',
                'direccion' => 'Guayaquil, Ecuador', 'fecha_nacimiento' => '1985-11-02',
                'genero' => 'masculino',
            ]
        );
    }
}
