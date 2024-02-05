<?php

namespace App\Http\Controllers;

use App\Models\event;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveEvent(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_length' => 'required',
        ));
        
        $event = new event();
        $event->name = $request->input('name');
        $event->description = $request->input('description');

        $eventDate = DateTime::createFromFormat('d/m/Y', $request->input('event_date'));
        $formattedDate = $eventDate->format('Y-m-d');


        $eventTime = DateTime::createFromFormat('h:i A', $request->input('event_time'));
        $formattedTime = $eventTime->format('H:i:s');

        $event->event_date = $formattedDate;
        $event->event_time = $formattedTime;
        $event->event_length = $request->input('event_length');
        $event->created_by = Auth::user()->id;
        $event->save();
        return redirect()->back()->with('status', 'Your booking has been saved');
    }
}
