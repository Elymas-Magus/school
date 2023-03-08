<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanejamentoAula extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'conteudo',
        'data_fim',
        'data_inicio',
        'disciplina_id',
        'habilidades_competencias',
        'titulo',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'data_fim',
        'data_inicio',
        'deleted_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/planejamento-aulas/'.$this->getKey());
    }
}
