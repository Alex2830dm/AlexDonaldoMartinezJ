<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cliente',
        'representante',
        'telefono',
        'ruta',
        'email',
        'd_calle',
        'd_colonia',
        'd_municipio',
        'd_referencia'
    ];
}
