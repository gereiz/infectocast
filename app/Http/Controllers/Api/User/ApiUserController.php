<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    // altera o nome do usuário
    public function updateProfile(Request $request)
    {
        $user = auth()->user() ;
        // $user = User::find($request->idUser);

        if(Hash::check($request->password, $user->password)) {
            if($request->photo) {
                // salva a imagem na pasta storage/app/public
                $filname = $request->name.'_photo.'.$request->photo->extension();
                $path = 'profile-photos';
                $request->photo->storeAs('public/'.$path, $filname);

                $user->profile_photo_path = $path.'/'.$filname;

            }
            
            if($request->name) {
                $user->name = $request->name;
            }

            if($request->email) {
                $user->email = $request->email;
            }

            if($request->phone) {
                $user->phone = $request->phone;
            }
            
            $user->save();

            // realiza o logout do usuário
            auth()->logout();

            return response()->json('Perfil atualizado com sucesso', 200);  
        }
        
        return response()->json('Erro ao atualizar o perfil', 404);
    }

    // altera a senha do usuário
    public function updatePassword(Request $request)
    {
        
        // dd($request->all());
        $user = auth()->user();
        

        if(Hash::check($request->password, $user->password) && $request->newPassword == $request->confirmPassword) {
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return response()->json('Senha atualizada com sucesso', 200);
        
        } elseif($request->newPassword != $request->confirmPassword) {
            return response()->json('As senhas não conferem', 404);
        
        } elseif(!Hash::check($request->password, $user->password)) {
            return response()->json('Senha atual incorreta', 404);
        } else


        return response()->json('Erro ao atualizar a senha', 404);
    }
}
