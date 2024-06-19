<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;
use Rap2hpoutre\FastExcel\FastExcel;

class ExcelController extends Controller
{
    public function export()
    {
        try {
            $pqrsTramitadas = Pqr::where('estado', 'tramitada')->get();

            return (new FastExcel($pqrsTramitadas))->download('Pqrs.xlsx');
        } catch (\Exception $e) {
            // Manejar la excepción aquí
            toastr()->error('Error al exportar PQRs a Excel: ' . $e->getMessage(), 'Error');
            return redirect()->back(); // Redirigir de vuelta a la página anterior o manejarlo según tus necesidades
        }
    }
}
