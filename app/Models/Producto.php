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
    public function scopeVerifyFamilia($query, $familia_id)
    {
        $query->when($familia_id, function ($query, $familia_id) {
            $query->whereHas('subcategoria.categoria', function ($query) use ($familia_id) {
                $query->where('familia_id', $familia_id);
            });
        });
    }

    public function scopeVerifyCategoria($query, $categoria_id)
    {
        $query->when($categoria_id, function ($query, $categoria_id) {
            $query->whereHas('subcategoria', function ($query) use ($categoria_id) {
                $query->where('categoria_id', $categoria_id);
            });
        });
    }

    public function scopeVerifySubcategoria($query, $subcategoria_id)
    {
        $query->when($subcategoria_id, function ($query, $subcategoria_id) {
            $query->where('subcategoria_id', $subcategoria_id);
        });
    }

    public function scopeCustomOrder($query, $orderBy)
    {
        $query->when($orderBy == 1, function ($query) {
            $query->orderBy('created_at', 'desc');
        })
            ->when($orderBy == 2, function ($query) {
                $query->orderBy('p_unit', 'desc');
            })
            ->when($orderBy == 3, function ($query) {
                $query->orderBy('p_unit', 'asc');
            });
    }


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::url($this->imagen),
        );
    }
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
}
