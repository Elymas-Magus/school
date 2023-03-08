<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;
    protected $table = 'aluno';

    protected $fillable = [
        'bol_aee',
        'celular',
        'data_matricula',
        'data_nascimento',
        'email_responsavel',
        'escola_id',
        'registro',
        'telefone',
        'turma_id',
        'user_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'data_matricula',
        'data_nascimento',
        'deleted_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/alunos/'.$this->getKey());
    }
}
