<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;

class EventControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewBookings(){
        $bookings = event::all();
        return view('admin.booking.view-bookings', compact('bookings'));
    }
}
