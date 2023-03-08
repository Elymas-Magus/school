<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aula extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bol_online',
        'categorizacao_item_id',
        'data_fim',
        'data_inicio',
        'disciplina_id',
        'escola_id',
        'link_transmissao',
        'observacoes',
        'periodo_letivo_id',
        'planejamento_id',
        'plataforma_id',
        'professor_id',
        'replica_id',
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
        return url('/admin/aulas/'.$this->getKey());
    }
}
