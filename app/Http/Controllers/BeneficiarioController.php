<?php

namespace App\Http\Controllers;

use App\Models\beneficiario;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function update(Request $request)
    {
        $ids = $request->input('ids');
        $fechas = $request->input('fechas');

        foreach ($ids as $key => $id) {
            $registro = beneficiario::find($id);
            $registro->fecha = $fechas[$key];
            $registro->save();
        }            
        
    }
}