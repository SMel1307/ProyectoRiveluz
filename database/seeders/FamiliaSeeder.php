<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $familias = [
            'Equipos Analiticos' => [
                'Equipos de Laboratorio' => [
                    'Centrifugas',
                    'Autoclave',
                    'Microscopios',
                    'Baño Maria',
                    'Vortex',
                    'otros',
                ],
            ],
            'Insumos de laborario' => [
                'Material de Vidrio' => [
                    'Matraces',
                    'Pipetas aforadas',
                    'Pipetas volumetricas',
                    'Probetas',
                    'Tubos de ensayo',
                    'Morteros',
                ],
                'Plastico' => [
                    'Cajas petri',
                    'Aspirador de pipetas',
                    'Criobox',
                    'Frascos Colectores',
                    'Gradillas de plastico',
                ],
                'Insumos en general' => [
                    'Capsula de porcelana',
                    'Cola de Zorro',

                ],
            ],
            'Reactivos' => [
                'Reactivos' => [
                    'Anticuerpos',
                    'Genetico y Molecular',
                ],
              
                'Pruebas rapidas' => [
                    'H. Pilory',
                    'Test Emnbarazo',
                    'Covid-19 IGG/IGM',
                    'Prueba Toxo IGG/IGM',
                ],
            ],
        ];
        foreach($familias as $familia => $categorias){

            $familia= Familia::create([
            'nombrefam'=> $familia,
        ]);
        foreach($categorias as $categoria => $subcategorias){
            
            $categoria = Categoria::create([
                'nombrecat'=>$categoria,
                'familia_id' => $familia->id,
            ]);
            
            foreach($subcategorias as $subcategoria){
            
              Subcategoria::create([
                    'nombresub'=>$subcategoria,
                    'categoria_id' => $categoria->id,
                ]);
        }
        }

    }
}
}