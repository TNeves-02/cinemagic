<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    
    protected $fillable = [
        'code',
        'nome'
    ];
    public function filme()
    {
        return $this->hasMany(Filme::class,'code','genero_code');
    }
}
