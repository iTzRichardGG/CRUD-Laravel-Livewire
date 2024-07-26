<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Productos;
use App\Models\Productos_sizes;
use App\Models\Sizes;
use Illuminate\Support\Facades\DB; // Asegúrate de importar DB


class Productos_sizesSeeder extends Seeder
{
    public function run(): void
    {
        $productos = Productos::all();
        $sizes = Sizes::all();

        foreach ($productos as $producto) {
            foreach ($sizes as $size) {
                DB::table('productos_sizes')->insert([
                    'productos_id' => $producto->id,
                    'sizes_id' => $size->id,
                    'stock' => rand(0, 100), 
                ]);
            }
        }
    }
}