<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'email',
        'direccion',
        'fecha_nacimiento',
        'genero',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function recetas(): HasMany
    {
        return $this->hasMany(Receta::class);
    }

    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }

    // Accesor: $cliente->nombre_completo
    protected function nombreCompleto(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: fn () => "{$this->nombre} {$this->apellido}",
        );
    }
}