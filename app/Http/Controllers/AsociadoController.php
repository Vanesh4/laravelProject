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

    public function index()
    {
        //$asociados = Asociado::all();
        $asociados = Asociado::with(['ciudade', 'distrito'])->paginate(10);
        return view('asociados.index', ['asociados' => $asociados]);
    }

    public function show(Request $request, $id)
    {
        //cedula por url asociados/ID?id=
        $id = $request->input('id');
        $asociado = Asociado::where('cedula', $id)->firstOrFail();
        $beneficiarios = beneficiario::where('cedulaAsociado', $id)->with('parentescoo')->get();        

        return view('asociados.show', compact('asociado', 'beneficiarios'));
    }

    public function update(Request $request, $cedula)
    {
        Asociado::where('cedula', $cedula)
            ->update(['fechaNacimiento' => $request->input('fechaNacimiento')]);

        $asociado = Asociado::where('cedula', $cedula)->firstOrFail();
        $beneficiarios = Beneficiario::where('cedulaAsociado', $cedula)->get();
        return view('asociados.show', compact('asociado', 'beneficiarios'))->with('success', 'Datos actualizados');
    }

    public function generarpdf($id)
    {        
        $asociado = Asociado::where('cedula', $id)->with(['ciudade', 'distrito'])->firstOrFail();
        $beneficiarios = beneficiario::where('cedulaAsociado', $id)->with('parentescoo')->get();     


        $data = ['asociado' => $asociado, 'beneficiarios' => $beneficiarios];
        $pdf = PDF::loadView('asociados.showpdf', $data)->setPaper('legal', 'landscape');
        //return $pdf->stream();
        return $pdf->download(date('Y-m-d') .  $asociado->nombre . '.pdf');
        //return view('asociados.showpdf', $data);
    }
}
