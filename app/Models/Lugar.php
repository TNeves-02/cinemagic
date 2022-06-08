<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'lugares';
    protected $fillable = [
        'sala_id', 'fila', 'posicao'
    ];
    public function bilhete()
    {
        return $this->hasOne(Bilhete::class,"id","lugar_id");
    }

    public function sala()
    {
        return $this->hasOne(Sala::class,"id","sala_id");
        
    }
}