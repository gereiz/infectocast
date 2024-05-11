<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiUserController extends Controller
{
    // altera o nome do usuário
    public function updateProfile(Request $request)
    {
        
        $user = auth()->user();

        if($user->password == bcrypt($request->password)) {
            if($request->photo) {
                $user->profile_photo_path = $request->photo;

                // salva a imagem na pasta storage/app/public
                $filname = $request->name.'_photo.'->extension();
                $path = 'profile-photos/';

                $request->photo->storeAs('public/'.$path, $filname);

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

        }
        
        return response()->json($user);
    }
}
