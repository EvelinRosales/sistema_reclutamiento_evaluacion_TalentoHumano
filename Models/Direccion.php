<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    //use HasFactory;

    protected $table='dirección';
    

    protected $primaryKey='Cod_Direccion';

    public $timestamps=false;

    protected $fillable = [
        'Cod_Personal',
        'Departamento',
        'Municipio',
        'Ciudad',
        'Zona',
        'Calle_Avenida',
        'Nro_Vivienda'

    ];
}
