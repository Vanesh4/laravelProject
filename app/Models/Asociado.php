<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuidade;

class Asociado extends Model
{
    use HasFactory;

    public function beneficiarios()
    {
        return $this->hasMany(beneficiario::class, 'cedulaAsociado', 'cedula');
    }

    public function ciudade() 
    {
        return $this->belongsTo(Cuidade::class, 'ciudad_id', 'codigo');
    }
}
