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
        // Relacion uno a muchos con la tabla marcas, el segundo parametro indica que utiliza la columna marca_id (la clave foranea) dentro de la tabla productos
        return $this->belongsTo(Marcas::class, 'marca_id');
    }

    public function categorias()
    {
        // Relacion uno a muchos con la tabla categorias, el segundo parametro indica que utiliza la columna categoria_id (la clave foranea) dentro de la tabla productos
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function sizes()
    {
        // Relacion muchos a muchos con la tabla sizes, se especifica que utiliza una tabla intermedia llamada productos_sizes,
        // Se utiliza withPivot('stock') para indicar que ademas de las claves foraneas tambien se debe incluir el campo stock de la tabla intermedia
        return $this->belongsToMany(Sizes::class, 'productos_sizes')->withPivot('stock');
    }
}
