<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// piogGFgvZ6BUyXd0f06DWVHFhmkbQL1edCBi9Esr56ca3d3f

class LoginController extends Controller
{
    public function login(Request $request) {

        if(Auth::attempt($request->only('email', 'password'))) {

            $token = $request->user()->createToken('login')->plainTextToken;

            session(['token' => $token]);
            
            return response()->json(['token' => session('token')]);

        }

        return response()->json("Não Logado", 403);

    }

    // Este metodo retorna o usuario pelo id do auth()->user()
    public function getUser() {
        $user = User::find(auth()->user()->id);
        
        return response()->json($user);
    }
    
    // public function logout() {

    // }
}
