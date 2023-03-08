<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodoLetivo extends Model
{
    use SoftDeletes;
    protected $table = 'periodo_letivo';

    protected $fillable = [
        'activated',
        'ano_referencia',
        'carga_horaria',
        'categorizacao_id',
        'created_by',
        'data_fim',
        'data_fim_rematricula',
        'data_inicio',
        'data_inicio_rematricula',
        'dias_letivos',
        'escola_id',
        'media',
        'nome',
        'observacao',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'data_fim',
        'data_fim_rematricula',
        'data_inicio',
        'data_inicio_rematricula',
        'deleted_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/periodo-letivos/'.$this->getKey());
    }
}
