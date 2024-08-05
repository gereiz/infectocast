<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MrShan0\PHPFirestore\FirestoreClient;

class NotificationController extends Controller
{
    private $connection;
    public function __construct()
    {
        $this->connection = new FirestoreClient(env('FIREBASE_PROJECT_ID'), env('FIRESTORE_API_KEY'), [
            'database' => '(default)',
        ]);
    }

    public function index()
    {

        $notificacoes = $this->connection->listDocuments('ff_push_notifications')['documents'];
        
        return view('notifications.index', compact('notificacoes'));
    }

}
