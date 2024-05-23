<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categorias = [
            [
                'nombre' => 'motocicletas',
                'imagen' => 'imagen1',
                'activo' => 1
            ],
            [
                'nombre' => 'automóviles',
                'imagen' => 'imagen2',
                'activo' => 1
            ],
            [
                'nombre' => 'bicicletas',
                'imagen' => 'imagen3',
                'activo' => 1
            ]
        ];

        foreach ($categorias as $categoriaData) {
            $categoria = new Categoria();
            $categoria->nombre = $categoriaData['nombre'];
            $categoria->imagen = $categoriaData['imagen'];
            $categoria->activo = $categoriaData['activo'];
            $categoria->save();
        }
    }
}
