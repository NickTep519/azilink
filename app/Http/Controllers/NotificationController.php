<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notifis() {

        $user = Auth::user(); 
    
        $notifications = $user->notifications; 
        $unreadNotifications = $user->unreadNotifications; 
    
        $dataNotifications = [];
        foreach ($notifications as $notification) {
            $dataNotifications[] = array_merge(
                $notification->data, 
                ['time' => $notification->created_at->diffForHumans()]
            ); 
        }
    
        $dataunreadNotifications = []; 
        if (!$unreadNotifications->isEmpty()) {
            foreach ($unreadNotifications as $notification) {
                $dataunreadNotifications[] = array_merge(
                    $notification->data, 
                    ['time' => $notification->created_at->diffForHumans()]
                ); 
            }
        }
    
        return response()->json([
            'notifications' => $dataNotifications,
            'unreadNotifications' => $dataunreadNotifications
        ]);
    }
    

    public function markAsReadd(Request $request) {

        Auth::user()->unreadNotifications->markAsRead();

        return response()->json(['message' => 'Toutes les notifications ont été marquées comme lues.']);
    }
}
