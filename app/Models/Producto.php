<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigopro',
        'nombrepro',
        'descripcion',
        'imagen',
        'p_unit',
        'subcategoria_id'
    ];

    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class);
    }
}
