<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\DB;
class VideoChatController extends Controller
{
    public function index(Request $request) {
        $eventDate = \Carbon\Carbon::now(); // Assuming you have a DateTime instance, you can replace this with your actual date and time

$formattedDateTime = $eventDate->format('Y-m-d');
// $events  = DB::table('events')->where('event_date', '>=', $formattedDateTime)
// ->get();
//         $user = $request->user();
//         $others = User::where('id', '!=', $user->id)->pluck('name', 'id');

$user = $request->user();

$events = DB::table('events')
    ->where('event_date', '>=', $formattedDateTime)
    ->where('created_by', '!=', $user->id)
    ->pluck('created_by');
//dd($events);
$others = User::whereIn('id', $events)->pluck('name', 'id');
//dd($others);
        return view('video_chat.index')->with([
            'user' => collect($request->user()->only(['id', 'name'])),
            'others' => $others
        ]);
    }
    
    public function auth(Request $request) {
        $user = $request->user();
        $socket_id = $request->socket_id;
        $channel_name = $request->channel_name;
        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            [
                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                'encrypted' => true
            ]
        );
        return response(
            $pusher->presence_auth($channel_name, $socket_id, $user->id)
        );
    }
}
