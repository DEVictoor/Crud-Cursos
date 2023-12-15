<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumno_curso', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('nota')->nullable();
            $table->foreignUlid('alumno_id')->constrained('alumnos');
            $table->foreignUlid('curso_id')->constrained('cursos');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos_cursos');
    }
};
