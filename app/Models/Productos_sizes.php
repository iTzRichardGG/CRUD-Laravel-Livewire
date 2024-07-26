<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos_sizes extends Model
{
    use HasFactory;

    protected $fillable = [ 'stock' ];

    public $timestamps = false;
}
