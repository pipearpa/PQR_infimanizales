<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;






class NuevapqrController extends Controller
{
    public function index()
    {
        return view('nuevapqr');
    }

    public function store(Request $request)
    {
        try {
            // Validación de los datos del formulario
            $validatedData = $request->validate([
                'tipo' => 'required',
                'descripcion' => 'required',
                'respuesta' => 'required',
                'nombre' => 'nullable',
                'archivo' => 'nullable|file|max:10240',
                // Agregar más validaciones aquí según tus necesidades
            ]);

            // Crear una nueva instancia del modelo PQR
            $pqr = new Pqr();

            // Asignar los valores a los campos del modelo
            $pqr->tipo = $validatedData['tipo'];
            $pqr->descripcion = $validatedData['descripcion'];
            $pqr->respuesta = $validatedData['respuesta'];
            $pqr->nombre = $request->has('anonimo') ? 'Anónimo' : $validatedData['nombre'];
            $pqr->tipoDocumento = $request->has('anonimo') ? 'Sin especificar' : $request->input('tipoDocumento');
            $pqr->numero_documento = $request->has('anonimo') ? 'Sin especificar' : $request->input('numero_documento');
            $pqr->email = $request->has('anonimo') ? 'Sin especificar' : $request->input('email');
            $pqr->numeroTel = $request->has('anonimo') ? 'Sin especificar' : $request->input('numeroTel');
            $pqr->direccion = $request->has('anonimo') ? 'Sin especificar' : $request->input('direccion');
            $pqr->estado = 'Sin tramitar';

            // Guardar el archivo en la ubicación deseada con nombre único generado por UUID y conservar su extensión original
            if ($request->hasFile('archivo')) {
                $archivo = $request->file('archivo');
                $nombreArchivo = Str::uuid() . '.' . $archivo->getClientOriginalExtension();
                $ruta = 'archivos_pqr';
                $archivo->storeAs($ruta, $nombreArchivo);
                $pqr->archivo = $nombreArchivo;
            }

            // Guardar la PQR en la base de datos
            $pqr->save();

            // Obtener el correo electrónico del usuario
            $userEmail = $request->input('email');

            // Enviar el correo electrónico al usuario (debería ser asincrónico)
            Mail::send('emails.pqr_sent', ['pqr' => $pqr], function ($message) use ($userEmail) {
                $message->to($userEmail)
                    ->subject('Nueva PQR Creada');
            });

            // Redireccionar al usuario a la página de inicio con un mensaje de éxito
            toastr()->success('La PQR se ha creado exitosamente.', 'Congrats');
            return redirect('/')->with('status');
        } catch (\Exception $e) {
            // Manejar la excepción
            toastr()->error('Error al crear la PQR: ' . $e->getMessage(), 'Error');
            return redirect()->back()->withInput();
        }
    }

    public function marcarEnTramite($id)
    {
        try {
            $pqr = Pqr::findOrFail($id);
            $pqr->estado = 'En trámite';
            $pqr->save();

            toastr()->info('La PQR se ha puesto en trámite correctamente.', 'Muy bien');
            return Redirect::route('dashboard');
        } catch (\Exception $e) {
            toastr()->error('Error al marcar la PQR en trámite: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function marcarTramitada($id)
    {
        try {
            $pqr = Pqr::findOrFail($id);
            $pqr->estado = 'Tramitada';
            $pqr->save();

            // Envía el correo electrónico al usuario (debería ser asincrónico)
            toastr()->info('La PQR ha sido tramitada correctamente.', 'Muy bien');
            return Redirect::route('dashboard');
        } catch (\Exception $e) {
            toastr()->error('Error al marcar la PQR como tramitada: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    
}
