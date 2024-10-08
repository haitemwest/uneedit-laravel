<?php

    // require '../../../includes/classLoader.php';

    // Hoezo kan je niet requiren?

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
    <h1>TEST</h1>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calendar with Time Slots</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>PHP Calendar with Time Slots</h1>
    <div id="calendar"></div>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.10.1/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                events: loadEvents(), // URL to fetch events from PHP
                slotDuration: '00:30:00', // Set time slot interval
                editable: true,
                selectable: true,
            });

            calendar.render();
        });

        function loadEvents() {
            var events = [];
            events.push({
                title: "Test",
                start: "04-06-2024 00:00:00",
                end: "04-046-2024 08:30:00",
                color: "red",
                textColor: "white",
                allDay: true,
            })
        //     <?php
        //         $conn = mysqli_connect("localhost", "root", "", "calendar");
        //         $sql = "SELECT * FROM events";
        //         $result = mysqli_query($conn, $sql);
        //         while ($row = mysqli_fetch_assoc($result)) {
        //             $events[] = $row;
        //         }
        //    ?>
            return events;
        }
    </script>
</body>
</html>
