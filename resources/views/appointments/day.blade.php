<!DOCTYPE html>
<html>
<head>
    <title>Appointments for {{ $date }}</title>
</head>
<body>
    <h1>Appointments for {{ $date }}</h1>
    <ul>
        @foreach($appointments as $appointment)
            <li>{{ $appointment->time }} - {{ $appointment->description }}</li>
        @endforeach
    </ul>
    <a href="{{ route('appointments.calendar') }}">Back to Calendar</a>
</body>
</html>
