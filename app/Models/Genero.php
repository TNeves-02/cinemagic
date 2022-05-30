<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'code','nome'
    ];
    public function filme()
    {
        return $this->hasMany(Filme::class,'code','genero_code');
    }
  
}
