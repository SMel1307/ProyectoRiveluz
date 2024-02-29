<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'nombrefam',
    ];


    public function categoria(){
        return $this->hasMany(Categoria::class);
    }
}
