<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotfictionController extends Controller
{
    public function read_All()
    {
        $not = auth()->user()->unreadNotifications;

        if ($not) {
            $not->markAsRead();
        }

        return response()->json(['success' => true]);
    }
    public function readNotifiction($notifiction_id)
    {
        DB::table('notifications')->where('id',  $notifiction_id)->update(['read_at' => now()]);
        return response()->json([
            'msg' => "Success Read Notfictions"
        ]);
    }

    public function delete_all_notifiction()
    {
        $user_id = auth()->user()->id;

        DB::table('notifications')->where('notifiable_id', $user_id)->delete();
        return response()->json([
            'massage' => 'Success Delete All '
        ]);
    }
}
