<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades';
    protected $primaryKey = 'id_ciudad';
    public $timestamps = true;

    protected $fillable = ['nombre_ciudad', 'estado', 'codigo_postal'];

    // Relación: una ciudad tiene muchos pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_ciudad', 'id_ciudad');
    }
}
