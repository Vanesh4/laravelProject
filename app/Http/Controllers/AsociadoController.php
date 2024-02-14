<?php

namespace App\Http\Controllers;
use App\Models\Asociado;

use Illuminate\Http\Request;

class AsociadoController extends Controller
{
    public function index(){
        $asociados = Asociado::all();
        return view('asociados.index', ['asociados' => $asociados]);
    }

    public function show(Request $request, $id)
    {
        // Obtener el ID del asociado de la solicitud
        $id = $request->input('id');

        // Buscar el asociado por el ID
        $asociado = Asociado::where('cedula', $id)->first();

        // Pasar los detalles del asociado a la vista
        return view('asociados.show', compact('asociado'));
    }

}
