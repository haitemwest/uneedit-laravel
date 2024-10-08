@auth
    <h1>Hallo</h1>
@else
    <script>window.location.href = "/appointments"</script>
@endauth

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
    <style>
        /* Add your CSS styling here */
    </style>
</head>

<body>
    <h1>Book an Appointment</h1>
    <form action="/appointments/create" method="POST">
        @csrf
        <div>
            <label for="subject">Onderwerp voor de afspraak:</label>
            <br>
            <select name="subject" id="subject" onchange="askReason()">
                <option value="">Selecteer een onderwerp</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->subjectTitle }}">{{ $subject->subjectTitle }}</option>
                @endforeach
                <option value="other">Overig</option>
            </select>
            <span style="display: none;" id="span-reason">
                <label for="reason">Geef aub uw overige reden op:</label>
                <input type="text" name="reason" id="reason">
            </span>
        </div>

        <div>
            <label for="description">Geef uw probleem/reden op:</label>
            <br>
            <textarea name="description" id="description" cols="30" rows="3"></textarea>
        </div>

        <div>
            <label for="date">Select Date:</label>
            <input type="date" name="date" id="date" class="flatpickr" placeholder="Select Date">
        </div>
        <div>
            <label for="start_time">Select Start Time:</label>
            <select name="start_time" id="start_time">
                <!-- Time slots will be populated dynamically using JavaScript -->
            </select>
        </div>
        <div>
            <label for="end_time">Select End Time:</label>
            <select name="end_time" id="end_time">
                <!-- Time slots will be populated dynamically using JavaScript -->
            </select>
        </div>
        <button type="submit">Boek</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <script>
    // Initialize Flatpickr for date selection
    flatpickr('#date', {
        minDate: 'today',
        dateFormat: 'Y-m-d',
        onChange: function (selectedDates, dateStr, instance) {
            // Update time slots based on selected date
            updateTimeSlots(dateStr);
        }
    });

    // Function to update time slots based on selected date
    function updateTimeSlots(date) {
        fetch(`/appointments/available-times?date=${date}`)
            .then(response => response.json())
            .then(timeSlots => {
                // Clear existing options
                const startSelect = document.getElementById('start_time');
                startSelect.innerHTML = '';

                // Add time slots as options
                timeSlots.forEach(slot => {
                    const option = document.createElement('option');
                    option.value = slot;
                    option.text = slot;
                    startSelect.appendChild(option);
                });

                const endSelect = document.getElementById('end_time');
                endSelect.innerHTML = '';
                timeSlots.forEach(slot => {
                    const option = document.createElement('option');
                    option.value = slot;
                    option.text = slot;
                    endSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching available time slots:', error));
    }

    function askReason() {
        const reason = document.getElementById('subject').value;
        if (reason == "other") {
            document.getElementById('span-reason').style.display = 'block';
        } else {
            document.getElementById('span-reason').style.display = 'none';
        }
    }
</script>
</body>

</html>
