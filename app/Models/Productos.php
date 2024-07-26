<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'sku', 'precio', 'genero', 'marca_id', 'categoria_id','path_imagen',
    ];

    public function marcas()
    {
        return $this->belongsTo(Marcas::class, 'marca_id');
    }

    public function categorias()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Sizes::class, 'productos_sizes')->withPivot('stock');
    }
}
