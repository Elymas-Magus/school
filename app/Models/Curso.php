<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;
    protected $table = 'curso';

    protected $fillable = [
        'activated',
        'descricao',
        'escola_id',
        'nome',
        'qtd_vagas_alunos',
        'qtd_vagas_alunos_aee',
        'total_periodos',
    
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
        return url('/admin/cursos/'.$this->getKey());
    }
}
