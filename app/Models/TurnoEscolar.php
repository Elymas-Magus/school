<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TurnoEscolar extends Model
{
    use SoftDeletes;
    protected $table = 'turno_escolar';

    protected $fillable = [
        'descricao',
        'titulo',
    
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
        return url('/admin/turno-escolars/'.$this->getKey());
    }
}
