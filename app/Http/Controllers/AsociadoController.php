<?php

namespace App\Http\Controllers;
use App\Models\Asociado;
use App\Models\beneficiario;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class AsociadoController extends Controller
{
    public function index(){
        $asociados = Asociado::all();
        return view('asociados.index', ['asociados' => $asociados]);
    }

    public function show(Request $request, $id)
    {
        // $id = $request->input('id');
        // $asociado = Asociado::where('cedula', $id)->first();
        // return view('asociados.show', compact('asociado'));
        
        $id = $request->input('id');
        $asociado = Asociado::where('cedula', $id)->firstOrFail();
        $beneficiarios = beneficiario::where('cedulaAsociado', $id)->get();
        //$beneficiarios = $asociado->beneficiarios;       
        return view('asociados.show', compact('asociado', 'beneficiarios'));
    
    }

    public function generarpdf($id)
    {
        $asociado = Asociado::where('cedula', $id)->firstOrFail();
        $beneficiarios = Beneficiario::where('cedulaAsociado', $id)->get();

        $data = ['asociado' => $asociado, 'beneficiarios' => $beneficiarios];

        $pdf = PDF::loadView('asociados.show', $data);
        //return $pdf->stream();
        return $pdf->download(date('Y-m-d') .  $asociado->nombre . '.pdf');
    }
}
