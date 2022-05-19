<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'sala_id', 'fila', 'posicao'
    ];
    public function bilhete()
    {
        return $this->hasOne(Bilhete::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
        
    }
}
