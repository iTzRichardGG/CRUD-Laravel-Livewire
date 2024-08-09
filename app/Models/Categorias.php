<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function products()
    {
        // Relacion uno a muchos con la tabla productos
        return $this->hasMany(Productos::class);
    }

}
