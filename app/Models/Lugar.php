<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lugar extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = false;
    protected $table = 'lugares';
    protected $fillable = [
        'sala_id', 
        'fila', 
        'posicao'
    ];
    public function bilhete()
    {
        return $this->hasOne(Bilhete::class,"id","lugar_id");
    }

    public function sala()
    {
        return $this->hasOne(Sala::class,"sala_id","id");
        
    }
}
