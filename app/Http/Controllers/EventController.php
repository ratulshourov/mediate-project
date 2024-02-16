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
        ));
    
        $event = new event();
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        
       // $eventDate = DateTime::createFromFormat('d/m/Y', $request->input('event_date'));
        //$formattedDate = $eventDate->format('Y-m-d');


       // $eventTime = DateTime::createFromFormat('h:i A', $request->input('event_time'));
       // $formattedTime = $eventTime->format('H:i:s');
       $dateTime = new DateTime($request->input('event_date'));

        // Format the date and time as yyyy/mm/dd H:i
        $formattedDateTime = $dateTime->format('Y/m/d H:i');
        
        // Output the formatted date and time
      //  echo $formattedDateTime;
       // dd($formattedDateTime);

        $event->event_date = $formattedDateTime;
        //$event->event_time = $formattedTime;
        $event->event_length = $request->input('event_length');
        $event->created_by = Auth::user()->id;
        $event->save();
       // echo "<script> alert('Schedule Successfully Saved.'); location.replace('./') </script>";
        return redirect()->back()->with('status', 'Your booking has been saved');
    }
}
