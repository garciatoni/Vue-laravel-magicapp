<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
// use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Password;

use Illuminate\Support\Facades\Mail;

use App\Mail\email;

//CONTROLADOR DE AUTENTIFICACIÓN Y GESTIÓN DE USUARIO
//SE USA LARAVEL SANCTUM PARA LA AUTENTICACIÓN, MÁS INFORMACIÓN EN: https://laravel.com/docs/8.x/sanctum
//SE USA LARAVEL FORTIFY PARA LA RECUPERACIÓN DE CONTRASEÑA, MÁS INFORMACIÓN EN: https://laravel.com/docs/8.x/fortify

class AuthController extends Controller
{

    //Metodo de registro de usuario
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => ['required', 'max:10'],
            'email'                 => ['required', 'email', 'unique:users'],
            'password'              => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        return response()->json(['msg' => 'Registro satisfactorio.']);
    }

    //Metodo para realizar el login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'contraseña' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->contraseña, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Estas credenciales no coinciden con nuestros registros.'],
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }

    //Metodo para cerrar la sessón
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['msg' => 'Logout Successfull']);
    }

    //Metodo  para editar el usuario.
    public function edit(Request $request, $id)
    {
        $request->validate([
            'name'                  => ['required', 'max:10'],
            'password'              => ['required', 'min:8'],
            'newPassword'           => ['min:8'],
            'password_confirmation' => ['min:8', 'same:newPassword']
        ]);

        $user = User::find($id);

        if (Hash::check($request->password, $user->password)) {
            $user->name = $request->name;

            if ($request->newPassword != 'NULL') {
                $user->password = Hash::make($request->newPassword);
            }
            $user->save();
            return 'Exito';
        }
        // $user = DB::table('users')->where('id', '=', $id)->get();
    }

    //Metodo para enviar un correo de restablecimiento de contraseña
    public function forgot(Request $request)
    {

        $request->validate([

            'email' => ['required', 'email']

        ]);

        $email['email'] = $request->email;

        Log::info(Password::sendResetLink($email));

        $status = Password::sendResetLink($email);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


    //Metodo para eliminar una cuenta.
    public function delete(Request $request, $id){
        $request->validate([
            'password'              => ['required', 'min:8'],
        ]);

        $user = User::find($id);
        if (Hash::check($request->password, $user->password)) {
            $user->delete();
            return 0;
        }
    }
}
