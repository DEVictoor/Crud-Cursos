<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumnos extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $table = 'alumnos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'estado',
        'fecha_nacimiento'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'datetime:d-m-Y H:i:s',
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s'
    ];

    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(
            Cursos::class, 
            'alumno_curso',
            'alumno_id',
            'curso_id'
        );
    }
}