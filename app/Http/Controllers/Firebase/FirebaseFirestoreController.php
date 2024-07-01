<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MrShan0\PHPFirestore\FirestoreClient;

// Optional, depending on your usage
use MrShan0\PHPFirestore\Fields\FirestoreTimestamp;
use MrShan0\PHPFirestore\Fields\FirestoreArray;
use MrShan0\PHPFirestore\Fields\FirestoreBytes;
use MrShan0\PHPFirestore\Fields\FirestoreGeoPoint;
use MrShan0\PHPFirestore\Fields\FirestoreObject;
use MrShan0\PHPFirestore\Fields\FirestoreReference;
use MrShan0\PHPFirestore\Attributes\FirestoreDeleteAttribute;
        

class FirebaseFirestoreController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $firestoreClient = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);


        $collection = 'users';

        // $firestoreClient->addDocument($collection, [
        //     'birthday' => new FirestoreTimestamp,
        //     'college' => 'Fupac GV',
        //     'college_uf' => 'MG',
        //     'country_id' => 55,
        //     'cpf' => '01576492611',
        //     'created_at' => new FirestoreTimestamp,
        //     'email' => 'geoscooby2@hotmail.com',
        //     'email_verified_at' => new FirestoreTimestamp,
        //     'gender' => 'M',
        //     'id_professional' => 3032,
        //     'is_admin' => true,
        //     'name' => 'Georgie Reis 2',
        //     'password' => 'Enghaw1986**',
        //     'phone' => '31999999999',
        //     'plan' => 0,
        //     'plan_exp_date' => null,
        //     'profile_photo_path' => 'https://lh3.googleusercontent.com/a-/AOh14Gj6',
        //     'updated_at' => new FirestoreTimestamp,


            
        // ]);

        $collections = $firestoreClient->listDocuments($collection, [
            // 'pageSize' => 1,
            // 'pageToken' => 'nextpagetoken'
        ]);
        


        dd($collections['documents'][0]);
    }
}
