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
        $id = $request->input('id');
        $asociado = Asociado::where('cedula', $id)->first();
        return view('asociados.show', compact('asociado'));
    }
    

}
