<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'recibo_id', 'cliente_id', 'sessao_id','lugar_id','preco_sem_iva','estado'
    ]

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function recibo()
    {
        return $this->belongsTo(Recibo::class);
    }

    public function lugar()
    {
        return $this->belongsTo(Lugar::class);
    }

    public function sessao()
    {
        return $this->belongsTo(Sessao::class);
    }

}
