<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
// use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => ['required'],
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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Estas credenciales no coinciden con nuestros registros.'],
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['msg' => 'Logout Successfull']);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name'                  => ['required'],
            'password'              => ['required', 'min:8'],
            'newPassword'           =>['min:8'],
            'password_confirmation' =>['min:8', 'same:newPassword']
        ]);

        $user = User::find($id);

        if(Hash::check($request->password, $user->password)){
            $user->name = $request->name;

            if(isset($request->newPassword)){
                $user->password = Hash::make($request->newPassword);
            }
            $user->save();
            return 'Exito';
        }else{
            return $user;
        }
        // $user = DB::table('users')->where('id', '=', $id)->get();
    }
}
