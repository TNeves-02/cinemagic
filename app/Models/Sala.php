<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'nome'
    ];
    
    public function sessao()
    {
        return $this->hasMany(Sessao::class,"id","sala_id");
        
    }
    public function lugar()
    {
        return $this->hasMany(Lugar::class,"id","sala_id");
        
    }
}
