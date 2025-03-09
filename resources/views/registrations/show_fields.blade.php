<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Username:') !!}
    <p>{{ $registration->user->name }}</p>
</div>

<!-- Event  Field -->
<div class="col-sm-12">
    {!! Form::label('event_id', 'Event Name:') !!}
    <p>{{ $registration->event->name }}</p>
</div>

<!-- Registration Date Field -->
<div class="col-sm-12">
    {!! Form::label('registration_date', 'Registration Date:') !!}
    <p>{{ $registration->registration_date }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $registration->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $registration->updated_at }}</p>
</div>

