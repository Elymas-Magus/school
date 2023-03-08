<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CursoGrade extends Model
{
    use SoftDeletes;
    protected $table = 'curso_grade';

    protected $fillable = [
        'activated',
        'bol_optativa',
        'carga_horaria',
        'color',
        'curso_id',
        'descricao',
        'hora_aula',
        'nome',
        'periodo',
    
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
        return url('/admin/curso-grades/'.$this->getKey());
    }
}
