<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
// use Google\Cloud\Storage\Connection\Rest;
use Illuminate\Http\Request;
use MrShan0\PHPFirestore\FirestoreClient;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

use Kreait\Firebase\Messaging\AndroidConfig;

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

    public function sendNotification(Request $request)
    {
        $messaging = app('firebase.messaging');
       
        $data = [
            'title' => $request->title,
            'body' => $request->content_notif,
            // 'image' => $request->image,
            'url' => $request->url,
            'created_at' => date('Y-m-d H:i:s')
        ];



        return redirect()->back();
    }


}
