<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Auth;


class FirebaseAuthController extends Controller
{

    public function register(Request $request)
    {
        $auth = app('firebase.auth');
        $email = $request->email;
        $password = $request->password;

        $userProperties = [
            'email' => $email,
            'emailVerified' => false,
            'password' => $password,
            'displayName' => 'John Doe',
            'disabled' => false,
        ];

        $createdUser = $auth->createUser($userProperties);

        return response()->json($createdUser);
    }

    public function flogin(Request $request)
    {

        $auth = app('firebase.auth');

        $email = $request->email;
        $password = $request->password;

        $signInResult = $auth->signInWithEmailAndPassword($email, $password);

        if($signInResult){
            
            // dd($signInResult);

            if(Auth::attempt($request->only('email', 'password'))){

                $token = $request->user()->createToken('login')->plainTextToken;
    
                session(['token' => $token]);

                return redirect()->route('dashboard');
    
            } else {
    
                return response()->json("Email ou Senha inválidos!", 403);
            }
        } else {
            return response()->json("Email ou Senha inválidos!", 403);
        }


    }

    public function flogout(Request $request)
    {
        $auth = app('firebase.auth');

        $auth->revokeRefreshTokens($request->user()->uid);

        Auth::logout();

        return redirect()->route('login');  

    }

    public function getUser(Request $request)
    {   
        $auth = app('firebase.auth');

        $user = $auth->getUser($request->user()->uid);

        return response()->json($user);
    }

}
