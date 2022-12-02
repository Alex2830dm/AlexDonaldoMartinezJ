<?php

namespace App\Exports;

use App\Models\Productos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductosVistaExport implements FromView 

{
    public function view(): View
    {
        return view('exports.productos', [
            'productos' => Productos::all()
        ]);
    }
}
