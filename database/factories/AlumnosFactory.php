<?php

namespace Database\Factories;

use App\Models\Alumnos;
use App\Models\Cursos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\Uid\Ulid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumnos>
 */
class AlumnosFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => fake()->firstName,
            'apellido' => fake()->lastName,
            'edad' => fake()->numberBetween(18, 25),
            // 'estado' => fake()->randomElement(['activo', 'inactivo']),
            'fecha_nacimiento' => fake()->dateTimeBetween('-30 years', '-18 years'),
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Alumnos $alumno) {
    //         $cursos = Cursos::inRandomOrder()->limit(rand(1, 3))->get();
    //         $alumno->cursos()->attach($cursos, ["id" => Ulid::generate()]);
    //     });
    // }
}
