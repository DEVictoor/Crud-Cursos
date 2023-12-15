<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Http\Requests\StoreCursosRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateCursosRequest;
use App\Models\Alumnos;
use Symfony\Component\Uid\Ulid;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Cursos::all();

        $alumnos = Alumnos::all();

        confirmDelete('Eliminar pedido', 'Estas seguro de eliminar un pedido');

        return view('cursos', compact('cursos', 'alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCursosRequest $request)
    {
        // dd($request->all());

        $curso = new Cursos();

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->save();

        $data = [];

        foreach ($request->alumnos as $id) {
            $data[$id] = ['id' => Ulid::generate()];
        }

        $curso->alumnos()->attach($data);

        Alert::success('Curso creado', 'con exito');

        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursos $curso)
    {
        $alumnos = Alumnos::all();

        // dd($curso->alumnos);

        return view('cursos_edit', compact('curso', 'alumnos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCursosRequest $request, Cursos $curso)
    {
        if($request->alumnos &&
            count($request->alumnos) > 0) $this->updateAlumnos($curso, $request->alumnos);

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion ?? '';

        $curso->save();

        Alert::success('Actualizado', 'Curso actualizado!');

        return redirect()->route('cursos.index');
    }

    public function updateAlumnos($curso, array $alumnos)
    {
        $curso->alumnos()->detach();

        $data = [];

        foreach ($alumnos as $id_alumno) {
            $data[$id_alumno] = ['id' => Ulid::generate()];
        }
        $curso->alumnos()->attach($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cursos $curso)
    {
        $curso->delete();

        Alert::success('Delete', 'Pedido eliminado!');

        return redirect()->back();
    }
}
