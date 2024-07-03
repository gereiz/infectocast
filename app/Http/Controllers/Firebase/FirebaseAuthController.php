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
        
        // verifica se o password tem no mínimo 6 caracteres
        if(strlen($password) < 6){
            toastr()->error('A senha deve ter no mínimo 6 caracteres!');
            return redirect()->back();
        }

        try {
            $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        } catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
            toastr()->error('Email ou Senha inválidos!');
            return redirect()->back();
        }

        

        if($signInResult){
            
            if(Auth::attempt($request->only('email', 'password'))){

                $token = $request->user()->createToken('login')->plainTextToken;
    
                session(['token' => $token]);

                return redirect()->route('dashboard');
    
            } else {
    
                toastr()->error('Email ou Senha inválidos!');
                return redirect()->back();
            }
        } else {
            toastr()->error('Email ou Senha inválidos!');
            return redirect()->back();
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
