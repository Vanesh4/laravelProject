<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'distritos';

    public function asociados()
    {
        return $this->hasMany(Asociado::class, 'distrito_id', 'cod_dist');
    }
    
}
