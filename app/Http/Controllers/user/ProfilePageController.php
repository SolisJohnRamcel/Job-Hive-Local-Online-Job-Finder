<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
class ProfilePageController extends Controller
{
    public function profile_page(Request $request)
    {
        // Fetch the authenticated user's data
        $user = $request->user();

        // Fetch the latest 10 notifications for the user
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Pass user and notifications data to the view
        return view('user.profile_page', [
            'user' => $user,
            'notifications' => $notifications,
        ]);
    }
}
