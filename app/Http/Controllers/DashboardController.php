<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;


class DashboardController extends Controller
{
    public function index()
    {
        try {
            $pqrs = Pqr::orderBy('id', 'desc')->get(); // Obtener todas las PQRs

            return view('dashboard', ['pqrs' => $pqrs]);
        } catch (\Exception $e) {
            // Manejar la excepción aquí
            toastr()->error('Error al cargar las PQRs: ' . $e->getMessage(), 'Error');
            return view('dashboard', ['pqrs' => []]); // Devolver la vista con un array vacío o manejarlo según tus necesidades
        }
    }
}
