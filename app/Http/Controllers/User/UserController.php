<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use MrShan0\PHPFirestore\FirestoreClient;

class UserController extends Controller
{
   
    public function index() {

        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);

        // $user = User::all();
        $user = $firestoreClient->listDocuments('users')['documents'];   

        return view('user.list_user', compact('user'));

    }

    

}
