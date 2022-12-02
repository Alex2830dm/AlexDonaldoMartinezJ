<?php

namespace App\Imports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clientes([
            'cliente' => $row[0],
            'representante' => $row[1],
            'telefono' => $row[2],
            'email' => $row[3],
            'ruta' => $row[4],
            'd_municipio' => $row[5],
            'd_referencia' => $row[6],
        ]);
    }
}
