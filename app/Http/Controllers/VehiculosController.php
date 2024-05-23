<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Categoria;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros = Vehiculo::where('placa', 'like', '%' . $texto . '%')->paginate(10);
        return view('vehiculo.index', compact('registros', 'texto'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('vehiculo.action', ['vehiculo' => new Vehiculo(), 'categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $vehiculo = new Vehiculo;
        $vehiculo->id_categoria = $request->input('id_categoria');
        $vehiculo->placa = $request->input('placa');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->propietario = $request->input('propietario');
        $vehiculo->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Vehiculo creado satisfactoriamente'
        ]);
    }

    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $categorias = Categoria::all();
        return view('vehiculo.action', compact('vehiculo', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->id_categoria = $request->input('id_categoria');
        $vehiculo->placa = $request->input('placa');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->propietario = $request->input('propietario');
        $vehiculo->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Actualización de datos satisfactoria'
        ]);
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return response()->json([
            'status' => 'success',
            'message' => $vehiculo->placa . ' Eliminado'
        ]);
    }
}
