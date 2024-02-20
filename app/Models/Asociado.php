<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociado extends Model
{
    use HasFactory;

    public function beneficiarios()
    {
        return $this->hasMany(beneficiario::class, 'cedulaAsociado', 'cedula');
    }
}
