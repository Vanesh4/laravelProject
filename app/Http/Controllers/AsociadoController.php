<?php

namespace App\Http\Controllers;
use App\Models\Asociado;
use App\Models\beneficiario;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class AsociadoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        //$asociados = Asociado::all();
        $asociados = Asociado::with('ciudade')->paginate(6);
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

        $pdf = PDF::loadView('asociados.show', $data)->setPaper('landscape');
        //return $pdf->stream();
        return $pdf->download(date('Y-m-d') .  $asociado->nombre . '.pdf');
    }
}
