<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'titulo', 
        'genero_code',
        'ano',
        'sumario',
        'trailer_url',
        'cartaz_url',
        
    ];
    
    public function genero()
    {
        return $this->belongsTo(Genero::class,"genero_code","code");
    }
    public function sessao()
    {
        return $this->hasMany(Sessao::class,"id","filme_id");
        
    }
}
