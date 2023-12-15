<?php

namespace Database\Seeders;

use App\Models\Cursos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cursos::factory()->count(10)->create();
    }
}
