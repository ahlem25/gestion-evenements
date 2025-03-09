<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Registration;

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
        // Get statistics
        $totalEvents = Event::count();
        $totalUsers = User::count();
        $totalRegistrations = Registration::count();

        $eventStatistics = Event::withCount('registrations')
            ->select('id', 'name', 'max_capacity', 'date')
            ->get()
            ->map(function ($event) {
                $event->current_capacity = $event->registrations_count;
                $event->remaining_capacity = $event->max_capacity - $event->registrations_count;
                return $event;
            });

        return view('home', compact('totalEvents', 'totalUsers', 'totalRegistrations', 'eventStatistics'));
    }
}
