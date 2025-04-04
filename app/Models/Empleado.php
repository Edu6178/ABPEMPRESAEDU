<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Definir la clave primaria si no es 'id'
    protected $primaryKey = 'id_empleado'; // Asegúrate de usar el nombre correcto de la clave primaria

    // Definir los campos que se pueden asignar de forma masiva
    protected $fillable = [
        'nombre_empleado',
        'puesto',
        'salario',
        'fecha_contratacion',
    ];

    // Si la clave primaria es autoincremental, Laravel lo manejará automáticamente
    public $incrementing = true;
}