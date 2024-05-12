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
    
        // $user = auth()->user();
        $user = User::find($request->idUser);
        // dd($user->password, $request->password, Hash::check($request->password, $user->password));

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

            return response()->json($user);
        }
        
        return response()->json('Erro ao atualizar o perfil');
    }
}
