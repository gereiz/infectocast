<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    
    // Este metodo realiza o registro do usuario
    public function register(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'country_id' => 'required',
            'phone' => 'required',
            'cpf' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'college' => 'required',
            'id_professional' => 'required',
            'college_uf' => 'required',
            'plan' => 'required',
            'is_admin' => 'required',
        ]);

        // retorna a mensagem de usuário já cadastrado
        if(User::where('email', $request->email)->exists()) {
            return response()->json('Usuário já cadastrado!');
        }
        


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'country_id' => $request->country_id,
            'phone' => $request->phone,
            'cpf' => $request->cpf,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'college' => $request->college,
            'id_professional' => $request->id_professional,
            'college_uf' => $request->college_uf,
            'plan' => $request->plan,
            'is_admin' => $request->is_admin,
        ]);

        return response()->json('Usuário cadastrado com sucesso!');
    }
}