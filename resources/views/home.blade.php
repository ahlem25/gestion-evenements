@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (Auth::check())
            @role('Admin')
                <h1 class="text-black-50">
                    Welcome Admin: {{ Auth::user()->name }}
                </h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Total Events</div>
                            <div class="card-body">
                                <p class="lead">{{ $totalEvents }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Total Users</div>
                            <div class="card-body">
                                <p class="lead">{{ $totalUsers }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Total Registrations</div>
                            <div class="card-body">
                                <p class="lead">{{ $totalRegistrations }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mt-5">Event Statistics</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Max Capacity</th>
                        <th>Current Capacity</th>
                        <th>Remaining Capacity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eventStatistics as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->max_capacity }}</td>
                            <td>{{ $event->current_capacity }}</td>
                            <td>{{ $event->remaining_capacity }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endrole
            @role('User')
                <h1 class="text-black-50">
                    Welcome back {{ Auth::user()->name }}!
                </h1>
                <p> You're not logged in as an admin.</p>
            @endrole
        @else
            <h1 class="text-black-50">
                You're not logged in!
            </h1>
        @endif
    </div>
@endsection
