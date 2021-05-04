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

        return response()->json(['msg' => 'Registered Successfully']);
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
                'email' => ['The provided credentials are incorrect.'],
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
            'password'              => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        $user = DB::table('users')->where('id', '=', $id)->get();
        $user->name = $request->name;
        $user->update();
        return $user;
    }
}
