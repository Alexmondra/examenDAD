<?php
namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros = Entrada::where('placa', 'like', '%' . $texto . '%')->paginate(10);
        return view('entrada.index', compact('registros', 'texto'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::all();
        return view('entrada.action', ['entrada' => new Entrada(), 'vehiculos' => $vehiculos]);
    }

    public function store(Request $request)
    {
        $entrada = new Entrada;
        $entrada->placa = $request->input('placa');
        $entrada->fecha_entrada = $request->input('fecha_entrada') ?: null;
        $entrada->fecha_salida = $request->input('fecha_salida') ?: null;
        $entrada->save();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Registro creado satisfactoriamente'
        ]);
    }

    public function edit($id)
    {
        $entrada = Entrada::findOrFail($id);
        $vehiculos = Vehiculo::all();
        return view('entrada.action', compact('entrada', 'vehiculos'));
    }

    public function update(Request $request, $id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->placa = $request->input('placa');
        $entrada->fecha_entrada = $request->input('fecha_entrada') ?: $entrada->fecha_entrada;
        $entrada->fecha_salida = $request->input('fecha_salida') ?: $entrada->fecha_salida;
        $entrada->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Actualización de datos satisfactoria'
        ]);
    }

    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Entrada eliminada satisfactoriamente'
        ]);
    }
}
