<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorizacaoConfig extends Model
{
    protected $table = 'categorizacao_config';

    protected $fillable = [
        'categorizacao_item_id',
        'data_fim',
        'data_inicio',
        'nota_total',
        'periodo_letivo_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'data_fim',
        'data_inicio',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/categorizacao-configs/'.$this->getKey());
    }
}
