<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'sessoes';
    protected $fillable = [
        'filme_id', 'sala_id', 'data','horario_inicio'
    ];

    public function filme()
    {
        return $this->belongsTo(Filme::class,"filme_id","id");
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class,"sala_id","id");  
    }
    public function bilhete()
    {
        return $this->hasOne(Bilhete::class,"id","sessao_id");        
    }
}
