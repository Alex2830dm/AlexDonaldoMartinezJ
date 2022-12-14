<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_cliente',
        'codigo',
        'subtotal',
        'impuestos',
        'total',
        'tipo',
    ];
}
