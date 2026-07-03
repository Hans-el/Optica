<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\LenteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ConfiguracionController;

Route::redirect('/', '/lentes');

// Páginas sueltas
Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('acercade');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/perfil', [ProfileController::class, 'show'])->name('profile');

// Reportes y configuración (por ahora solo vista índice, no son CRUD clásico)
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.index');

// Módulos CRUD (7 rutas resource: index, create, store, show, edit, update, destroy)
Route::resource('lentes', LenteController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('ventas', VentaController::class);
Route::resource('recetas', RecetaController::class);
Route::resource('usuarios', UsuarioController::class);