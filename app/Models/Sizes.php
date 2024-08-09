<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function products()
    {
        // Relacion muchos a muchos con la tabla productos, se especifica que utiliza una tabla intermedia llamada productos_sizes,
        // Se utiliza withPivot('stock') para indicar que ademas de las claves foraneas tambien se debe incluir el campo stock de la tabla intermedia
        return $this->belongsToMany(Productos::class, 'productos_sizes')->withPivot('stock');
    }
}
