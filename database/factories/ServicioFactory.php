<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory {
    protected $model = Servicio::class;

    public function definition(): array {
        return [
            'nombre' => $this->faker->word(),
            'precio' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}