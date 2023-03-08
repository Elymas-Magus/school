<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use SoftDeletes;
    protected $table = 'professor';

    protected $fillable = [
        'celular',
        'data_matricula',
        'data_nascimento',
        'escola_id',
        'registro',
        'telefone',
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
        return url('/admin/professors/'.$this->getKey());
    }
}
