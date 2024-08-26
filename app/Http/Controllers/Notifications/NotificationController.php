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


        

        // Example from https://firebase.google.com/docs/cloud-messaging/admin/send-messages#android_specific_fields
        $config = AndroidConfig::fromArray([
            'ttl' => '3600s',
            'priority' => 'normal',
            'notification' => [
                'title' => '$GOOG up 1.43% on the day',
                'body' => '$GOOG gained 11.80 points to close at 835.67, up 1.43% on the day.',
                'icon' => 'stock_ticker_update',
                'color' => '#f45342',
                'sound' => 'default',
            ],
        ]);

        $message = $message->withAndroidConfig($config);

        return redirect()->back();
    }


}
