<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyecto extends Model
{
    //

    protected $table = 'proyectos';

    protected $fillable = [
        'nombre',
        'color',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
