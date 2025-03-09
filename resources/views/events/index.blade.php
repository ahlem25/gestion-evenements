@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Events</h1>
                </div>
                <div class="col-sm-6">
                    @role('Admin')
                        <a class="btn btn-primary float-right"
                           href="{{ route('events.create') }}">
                            Add New
                        </a>
                    @endrole
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('events.table')
        </div>
    </div>

@endsection
