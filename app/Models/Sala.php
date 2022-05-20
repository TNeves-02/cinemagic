<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nome'
    ];
    
    public function sessao()
    {
        return $this->hasOne(Sessao::class);
        
    }
    public function lugar()
    {
        return $this->hasOne(Lugar::class);
        
    }
}
