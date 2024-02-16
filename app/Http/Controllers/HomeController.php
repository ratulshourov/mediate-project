<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $events = event::where('event_status', 1)->get();
       // return view('home', compact('events'));
       $schedules = Event::all();
$sched_res = [];

foreach ($schedules as $schedule) {
    $row['id'] = $schedule->id;
    $row['name'] = $schedule->name;
    $row['description'] = $schedule->description;
    $row['event_length'] = $schedule->event_length;
    $row['start'] = $schedule->event_date;
    $row['end'] = $schedule->event_date;
    $sched_res[$schedule->id] = $row;
}
       // $events = event::where('event_status', 1)->get();
        return view('home', ['sched_res' => $sched_res]);
    }

    public function adminIndex()
    {
        return view('admin.admin-dashboard');
    }
}
