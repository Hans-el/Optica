<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'nombre_contacto',
        'telefono',
        'email',
        'direccion',
        'ruc',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function lentes(): HasMany
    {
        return $this->hasMany(Lente::class);
    }
}