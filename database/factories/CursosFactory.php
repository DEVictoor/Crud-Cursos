<?php

namespace Database\Factories;

use App\Models\Alumnos;
use App\Models\Cursos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cursos>
 */
class CursosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->sentence(6),
            'descripcion' => fake()->paragraph(3)
        ];
    }

    // public function configure()
    // {
        // return $this->afterCreating(function (Cursos $cursos) {
        //     $alumnos = Alumnos::inRandomOrder()->limit(rand(1,5))->get();

        //     $input = array_reduce($alumnos, function($carry, $item) {
        //         $carry[$item] => [];
        //      }, []);

        //     $cursos->alumnos()->sync([]);
        // });
    // }
}
