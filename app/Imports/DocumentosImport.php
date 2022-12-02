<?php

namespace App\Imports;

use App\Models\Productos;
use Maatwebsite\Excel\Concerns\ToModel;

class DocumentosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Productos([
            'producto' => $row[0],
            'descripcion' => $row[1],
            'unidad' => $row[2],
            'cantidad' => $row[3],
            'precio' => $row[4],
            'tipo' => $row[5],
            'activo' => $row[6]
        ]);
    }
}
