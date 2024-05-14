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
            // 'cpf' => 'required',
            // 'birthday' => 'required',
            // 'gender' => 'required',
            // 'college' => 'required',
            // 'id_professional' => 'required',
            // 'college_uf' => 'required',
            'plan' => 'required',
            'is_admin' => 'required',
        ]);

        // retorna a mensagem de usuário já cadastrado
        if(User::where('email', $request->email)->exists()) {
            return response()->json('Usuário já cadastrado!', 403);
        }

        // converte o campo birthday para o formato de data xx/xx/xxxx para xxx-xx-xx
        // $birthday_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->birthday)));

        // remove a mascara do campo cpf
    //    $cpf = str_replace(['.', '-'], '', $request->cpf);

        // remove a mascara do campo phone
        $phone = str_replace(['(', ')', '-', ' '], '', $request->phone);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'country_id' => $request->country_id,
            'phone' => $phone,
            // 'cpf' => $cpf,
            // 'birthday' => $birthday_date,
            // 'gender' => $request->gender,
            // 'college' => $request->college,
            // 'id_professional' => $request->id_professional,
            // 'college_uf' => $request->college_uf,
            'plan' => 1,
            'plan_exp_date' => null,
            'is_admin' => 0,
        ]);

        return response()->json('Usuário cadastrado com sucesso!');
    }
}
