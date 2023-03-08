<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacaoTipo extends Model
{
    protected $table = 'notificacao_tipo';

    protected $fillable = [
        'tipo',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/notificacao-tipos/'.$this->getKey());
    }
}
