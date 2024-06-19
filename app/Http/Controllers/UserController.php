<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                if (Auth::user()->active) {
                    // El usuario está activo, procede con la autenticación
                    return redirect()->intended('/dashboard');
                } else {
                    // El usuario está desactivado, redirige de vuelta con un mensaje de error
                    return back()->with('error', 'Tu cuenta ha sido desactivada. Por favor, contacta al administrador.');
                }
            }

            // Las credenciales de autenticación son inválidas
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no son válidas.',
            ]);
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al intentar iniciar sesión: ' . $e->getMessage(), 'Error');
            return back();
        }
    }


    public function index()
    {
        try {
            $users = User::all();
            return view('users.index', compact('users'));
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al cargar la lista de usuarios: ' . $e->getMessage(), 'Error');
            return back();
        }
    }

    public function register()
    {
        return view('/register');
    }


    public function store(UserRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);
            return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al crear usuario: ' . $e->getMessage(), 'Error');
            return back();
        }
    }


    public function show(User $user)
    {
        try {
            return view('users.show', compact('user'));
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al cargar detalles del usuario: ' . $e->getMessage(), 'Error');
            return back();
        }
    }


    public function edit(User $user)
    {
        try {
            return view('users.edit', compact('user'));
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al cargar formulario de edición: ' . $e->getMessage(), 'Error');
            return back();
        }
    }


    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            ]);

            $user->update($request->all());

            return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al actualizar usuario: ' . $e->getMessage(), 'Error');
            return back();
        }
    }

    public function toggleActivation(User $user)
    {
        try {
            $user->active = !$user->active;
            $user->save();

            return redirect()->route('users.index')->with('success', 'Estado de usuario actualizado exitosamente.');
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al cambiar estado del usuario: ' . $e->getMessage(), 'Error');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
        } catch (\Exception $e) {
            // Manejo de errores: redirigir hacia atrás y mostrar un mensaje de error
            toastr()->error('Error al eliminar usuario: ' . $e->getMessage(), 'Error');
            return back();
        }
    }
}
