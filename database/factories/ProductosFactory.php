<?php

namespace Database\Factories;

use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductosFactory extends Factory
{
    protected $model = Productos::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->text,
            'sku' => $this->faker->unique()->randomNumber(8),
            'precio' => $this->faker->randomFloat(2, 0, 1000),
            'genero' => $this->faker->randomElement(['Hombre', 'Mujer', 'Unisex']),
            'marca_id' => $this->faker->numberBetween(1, 4),
            'categoria_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
