<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Receta extends Model
{
    use HasFactory;

    protected $table = 'recetas';

    protected $fillable = [
        'cliente_id',
        'optometrista_id',
        'fecha_examen',
        'od_esfera',
        'od_cilindro',
        'od_eje',
        'oi_esfera',
        'oi_cilindro',
        'oi_eje',
        'adicion',
        'distancia_pupilar',
        'diagnostico',
        'observaciones',
        'vigencia_hasta',
    ];

    protected $casts = [
        'fecha_examen' => 'date',
        'vigencia_hasta' => 'date',
        'od_esfera' => 'decimal:2',
        'od_cilindro' => 'decimal:2',
        'oi_esfera' => 'decimal:2',
        'oi_cilindro' => 'decimal:2',
        'adicion' => 'decimal:2',
        'distancia_pupilar' => 'decimal:1',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function optometrista(): BelongsTo
    {
        return $this->belongsTo(User::class, 'optometrista_id');
    }

    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }
}