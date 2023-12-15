<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Http\Requests\StoreAlumnosRequest;
use App\Http\Requests\UpdateAlumnosRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Eliminar pedido', 'Estas seguro de eliminar un pedido');
        $alumnos = Alumnos::all();

        return view('alumnos', compact('alumnos'));
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
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required|numeric',
            'fecha_nacimiento' => 'required|date',
        ]);

        // Buscar si existe un alumno con el mismo nombre y apellido
        $existingAlumno = Alumnos::where('nombre', $request->nombre)
            ->where('apellido', $request->apellido)
            ->first();

        // Crear y guardar el nuevo alumno si no existe uno con el mismo nombre y apellido
        if ($existingAlumno) {
            return Redirect::back()->withErrors(['message' => 'Ya existe un alumno con el mismo nombre y apellido.'])->withInput();
        } else {

            $alumnos = new Alumnos();
            $alumnos->nombre = $request->nombre;
            $alumnos->apellido = $request->apellido;
            $alumnos->edad = $request->edad;
            $alumnos->fecha_nacimiento = $request->fecha_nacimiento;


            if ($alumnos->save()) {
                Alert::success('Alumno actualizado con exito');
                return redirect()->route('alumnos.index')->with('success', 'C...');
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumnos $alumno)
    {
        return view('form_edit_alumnos', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumnos $alumno)
    {
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->edad = $request->edad;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        //$alumno->save();

        if ($alumno->save()) {
            Alert::success('Alumno actualizado con exito');
            return redirect()->back()->with('success', 'Cliente actualizado con exito');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumnos $alumno)
    {
        $alumno->delete();
        Alert::success('Alumno eliminado con exito');
        return redirect()->back()->with('success', 'Cliente eliminado con exito');
    }
}
