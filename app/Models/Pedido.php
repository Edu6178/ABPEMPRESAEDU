<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $primaryKey = 'id_pedido';

    public $timestamps = true;

    // Asegúrate de incluir 'id_ciudad' aquí
    protected $fillable = ['nombre_cliente', 'fecha_pedido', 'total', 'estado', 'id_ciudad'];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id_ciudad');
    }
}
