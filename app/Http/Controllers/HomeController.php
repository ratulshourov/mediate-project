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
        $events = event::where('event_status', 1)->get();
        return view('home', compact('events'));
    }

    public function adminIndex()
    {
        return view('admin.admin-dashboard');
    }
}
