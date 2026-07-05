<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\InicioController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\LenteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ConfiguracionController;

// Login / Logout 
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});
 
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
 
// Todo lo demás requiere estar autenticado 
Route::middleware('auth')->group(function () {
 
    Route::redirect('/', '/lentes');
 
    Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');
    Route::get('/nosotros', [NosotrosController::class, 'index'])->name('acercade');
    Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile');
 
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.index');
 
    Route::resource('lentes', LenteController::class);
    Route::resource('marcas', MarcaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('recetas', RecetaController::class);
    Route::resource('usuarios', UsuarioController::class);
});