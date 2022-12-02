<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles extends Model {
    use HasFactory;
    protected $table = 'detalles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'codigo',
        'idc',
        'cantidad',
        'costo',
        'descuento'
    ];
}
