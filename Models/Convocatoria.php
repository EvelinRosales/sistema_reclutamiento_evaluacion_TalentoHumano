<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    //use HasFactory;

    protected $table='convocatoria';
    

    protected $primaryKey='id_convocatoria';

    public $timestamps=false;

    protected $fillable = [
        'Area',
        'Descripcion',
        'Requisitos',
        'Condicion'

    ];
}
