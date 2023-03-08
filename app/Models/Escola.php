<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Escola extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'activated',
        'cep',
        'cnpj',
        'cod_municipio',
        'fone',
        'logradouro',
        'nome',
        'numero',
    
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
        return url('/admin/escolas/'.$this->getKey());
    }
}
