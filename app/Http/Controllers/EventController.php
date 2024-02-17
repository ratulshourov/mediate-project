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
        //dd($request->input('event_date'));

        $this->validate($request, array(
            'name' => 'required',
            'event_date' => 'required',
            //  'event_time' => 'required',
            'event_length' => 'required',
        )
        );
        
        if (!empty($request->input('id'))) {
         
            $event = Event::find($request->input('id'));
            $event->name = $request->input('name');
            $event->description = $request->input('description');
            $dateTime = new DateTime($request->input('event_date'));
            $formattedDateTime = $dateTime->format('Y/m/d H:i');
            $event->event_date = $formattedDateTime;
            $event->event_length = $request->input('event_length');
            $event->created_by = Auth::user()->id;
            $event->save();
        } else {
            // If 'id' is not present, create a new event
            $event = new Event();
            $event->name = $request->input('name');
            $event->description = $request->input('description');
            $dateTime = new DateTime($request->input('event_date'));
            $formattedDateTime = $dateTime->format('Y/m/d H:i');
            $event->event_date = $formattedDateTime;
            $event->event_length = $request->input('event_length');
            $event->created_by = Auth::user()->id;
            $event->save();
        }
        //$event = new event();
       
        // echo "<script> alert('Schedule Successfully Saved.'); location.replace('./') </script>";
        return redirect()->back()->with('status', 'Your booking has been saved');
    }
}
