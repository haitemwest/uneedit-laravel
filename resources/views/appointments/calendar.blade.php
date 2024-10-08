<!DOCTYPE html>
<html>
<head>
    <title>Appointment Calendar</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
</head>
<body>
    <div id='calendar'></div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: '/appointments/events',
                eventClick: function(event) {
                    if (event.url) {
                        window.location.href = event.url;
                        return false;
                    }
                }
            });
        });
    </script>
</body>
</html>
