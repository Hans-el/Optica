<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
 
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'telefono',
        'activo',
    ];
 
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'activo' => 'boolean',
        ];
    }
 
    // Ventas registradas por este usuario (vendedor)
    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }
 
    // Recetas donde este usuario actuó como optometrista
    public function recetasComoOptometrista(): HasMany
    {
        return $this->hasMany(Receta::class, 'optometrista_id');
    }
 
    public function esAdministrador(): bool
    {
        return $this->rol === 'administrador';
    }
}
 