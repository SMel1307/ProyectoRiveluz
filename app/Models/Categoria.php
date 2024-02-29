<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombrecat',
        'familia_id'
    ];

    public function familia(){
        return $this->belongsTo(Familia::class);
    }
    public function subcategoria(){
        return $this->hasMany(Subcategoria::class);
    }
}
