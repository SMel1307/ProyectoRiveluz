<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected function image():Attribute{
        return Attribute::make(
            get: fn() => Storage::url($this->imagen),
        );
    }
    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class);
    }
}