<?php

namespace App\Http\Controllers;
use App\Models\Veiculo;
use App\Models\Entrada;
use Illuminate\Http\Request;

class entradaController extends Controller
{
    public function index(Request $request)
    {
      
            $texto = trim($request->get('texto'));
            
            $registros = entrada::where('placa','like', '%' . $texto . '%')->paginate(10);            
            return view('entrada.index', compact('registros', 'texto'));
        
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Veiculo= new Veiculo();
        return view('veiculo.action',['categoria'=>new Veiculo()]);
    }

    
    public function store(CategoriaRequest $request)
    {
        $registro = new Categoria;
        $registro->nombre=$request->input('nombre');
        $registro->imagen="";
        $registro->save();
        return response()->json([
            'status'=> 'success',
            'message'=>'Registro creado satisfactoriamente'
        ]);
    }


    public function show(Categoria $categoria)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria=Categoria::findOrFail($id);
        return view('categoria.action',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->nombre;
        $categoria->save();

        return response()->json([
            'status'=> 'success',
            'message'=> 'Actualización de datos satisfactoria'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registro = Veiculo::findOrFail($id);
        $registro->delete();

        return response()->json([
            'status' => 'success',
            'message' => $registro->nombre . ' Eliminado'
        ]);
    }
}


