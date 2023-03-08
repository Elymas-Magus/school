<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificaco extends Model
{
    use SoftDeletes;
    protected $table = 'notificacoes';

    protected $fillable = [
        'assunto',
        'descricao',
        'destinatario_id',
        'remetente_id',
        'tipo_id',
    
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
        return url('/admin/notificacos/'.$this->getKey());
    }
}
