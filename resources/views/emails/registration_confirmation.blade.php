<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration Confirmation</title>
</head>
<body>
<h1>Event Registration Confirmation</h1>

<p>Hello {{ $userName }},</p>

<p>You have successfully registered for the event <strong>{{ $eventName }}</strong>!</p>

<p>Event Date: {{ \Carbon\Carbon::parse($eventDate)->format('F j, Y') }}</p>

<p>Thank you for registering, and we look forward to seeing you at the event!</p>

<p>Best Regards,</p>
<p>{{ config('app.name') }}</p>
</body>
</html>
