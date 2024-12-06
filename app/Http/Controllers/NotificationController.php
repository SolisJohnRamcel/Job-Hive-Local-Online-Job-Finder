<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();

        return response()->json([
            'success' => true,
            'unread_count' => Notification::where('is_read', false)->count(),
            'notification_id' => $notification->id,
            'is_read' => $notification->is_read // Add this for debugging purposes
        ]);
    }

  


}
