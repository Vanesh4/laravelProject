<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beneficiario extends Model
{
    use HasFactory;
    protected $table = 'beneficiarios';
    protected $primaryKey = 'cedula'; 
    public $timestamps = false;
    protected $fillable = [
        'cedula',
        'nombre',
        'parentezco',
        'cedulaAsociado',
        'fechaNacimiento',
        'fechaIngreso',
    ];
     /*
        idrow (int)
        cod_cli (15)
        nombre (50)
        edad (numeric 3,0)
        cod_par (2)
        tipo (1)
        fec_ing (datetime)
        cedula (15)
        fec_nac(datetime)
     */

    public function asociado()
    {
        return $this->belongsTo(Asociado::class, 'cedulaAsociado', 'cedula');
    }
}
