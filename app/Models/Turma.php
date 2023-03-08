<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;
    protected $table = 'turma';

    protected $fillable = [
        'activated',
        'bol_aee',
        'escola_id',
        'nome',
        'periodo_letivo_id',
        'qtd_vagas_alunos',
        'qtd_vagas_alunos_aee',
        'turno_escolar_id',
    
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
        return url('/admin/turmas/'.$this->getKey());
    }
}
