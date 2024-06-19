<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;

class ConsultaPqrCiudadanoController extends Controller
{
    public function index()
    {
        return view('consultapqrciudadano');
    }

    public function consultarPqrCiudadano(Request $request)
    {
        try {
            // Obtener los datos del formulario
            $id = $request->input('id');
            $numero_documento = $request->input('numero_documento');

            // Consultar la PQR utilizando los datos proporcionados
            $pqr = Pqr::where('id', $id)
                ->where('numero_documento', $numero_documento)
                ->first();

            // Verificar si se encontró la PQR
            if ($pqr) {
                // Si se encontró, retornar la vista con los datos de la PQR
                toastr()->success('Aquí está tu PQR', 'MIRA');
                return view('resultado_pqr', ['pqr' => $pqr]);
            } else {
                // Si no se encontró, mostrar un mensaje de error
                toastr()->error('No se encontró ninguna PQR con los datos proporcionados.', 'LO SENTIMOS');
                return view('consultapqrciudadano'); // Asegúrate de devolver la vista correcta
            }
        } catch (\Exception $e) {
            // Manejar la excepción aquí
            toastr()->error('Error al procesar la consulta de PQR.', 'ERROR'. $e->getMessage());
            return view('consultapqrciudadano'); // Asegúrate de devolver la vista correcta
        }
    }
}
