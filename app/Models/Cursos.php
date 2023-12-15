<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cursos extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $table = 'cursos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s'
    ];

    public function alumnos(): BelongsToMany
    {
        return $this->belongsToMany(
            Alumnos::class,
            'alumno_curso',
            'curso_id',
            'alumno_id'
        );
    }
}
