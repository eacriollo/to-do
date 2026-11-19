<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{
    //
    protected $table = 'tareas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'completada',
        'prioridad',
        'fecha_vencimiento',
        'fecha_creacion',

        ];

    protected function casts(): array
    {
        return [
            'completada' => 'boolean',
            'fecha_vencimiento' => 'date',
            'fecha_creacion' => 'date',
        ];
    }

    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(
            Etiquetas::class,
            'etiqueta_tarea',
            'tarea_id',
            'etiqueta_id')->withTimestamps();
    }


}
