<?php

namespace App\Http\Controllers;

use App\Models\Asociado;
use App\Models\beneficiario;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function update(Request $request, $cedula)
    {
        $ids = $request->input('ids');
        $fechas = $request->input('fechas');

        foreach ($ids as $key => $id) {
            $beneficiario = Beneficiario::find($id);
            if ($beneficiario) {
                $beneficiario->fechaNacimiento = $fechas[$key];
                $beneficiario->save();
            }
        }

        $asociado = Asociado::where('cedula', $cedula)->firstOrFail();
        $beneficiarios = Beneficiario::where('cedulaAsociado', $cedula)->get();
        return view('asociados.show', compact('asociado', 'beneficiarios'))->with('success', 'Datos actualizados');
    }
}
