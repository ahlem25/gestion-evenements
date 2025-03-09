@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (Auth::check())
            @role('Admin')
                <h1 class="text-black-50">
                    Welcome Admin: {{ Auth::user()->name }}
                </h1>
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
