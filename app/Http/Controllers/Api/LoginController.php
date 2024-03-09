<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request) {

        if(Auth::attempt($request->only('email', 'password'))) {

            $token = $request->user()->createToken('login')->plainTextToken;

            session(['token' => $token]);
            
            return response()->json(['token' => session('token'), 'user' => auth()->user()]);

        }

        return response()->json("Não Logado", 403);

    }

    // Este metodo retorna o usuario pelo id do auth()->user()
    public function getUser() {
        return response()->json(auth()->user());
    }
    
    
    // realiza o logout do usuario
    public function logout() {
        session()->forget('token');
        return response()->json('Deslogado com sucesso');
    }
    
}
