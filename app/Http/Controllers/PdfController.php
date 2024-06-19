<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pqr;

class PdfController extends Controller
{
    public function pdf() {
        try {
            // Ajustamos la consulta para traer solo las PQRs en estado "tramitada"
            $pqr = Pqr::where('estado', 'tramitada')->get();

            // Generamos el PDF con los registros filtrados
            $pdf = PDF::loadView('pdf', compact('pqr'));

            // Retornamos el PDF para su visualización en el navegador
            return $pdf->stream();
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al generar el PDF: ' . $e->getMessage(), 'Error');
            return back();
        }
    }
   
    public function exportPdf($id)
    {
        try {
            // Obtener la PQR específica por su ID
            $pqr = Pqr::findOrFail($id);

            // Generar el PDF con los datos de la PQR
            $pdf = PDF::loadView('pdf_id', compact('pqr'));

            // Retornar el PDF para descargarlo o visualizarlo en el navegador
            return $pdf->stream('pqr_' . $pqr->id . '.pdf');
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al generar el PDF: ' . $e->getMessage(), 'Error');
            return back();
        }
    }
}
