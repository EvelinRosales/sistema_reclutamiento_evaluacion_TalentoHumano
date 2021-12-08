<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil_Profesional extends Model
{
    //use HasFactory;

    protected $table='perfil_profesional';
    

    protected $primaryKey='Cod_Perfil';

    public $timestamps=false;

    protected $fillable = [
        'Cod_Personal',
        'Titulo',
        'Especialidad',
        'Experiencia_Laboral',
        'Cargo',
        'Otros'

    ];
}
