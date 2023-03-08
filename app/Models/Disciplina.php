<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
    use SoftDeletes;
    protected $table = 'disciplina';

    protected $fillable = [
        'activated',
        'carga_horaria',
        'curso_grade_id',
        'descricao',
        'hora_aula',
        'nome',
        'periodo_letivo_id',
        'professor_id',
        'turma_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/disciplinas/'.$this->getKey());
    }
}
