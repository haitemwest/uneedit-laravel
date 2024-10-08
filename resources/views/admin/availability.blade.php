<!-- In your admin view file, e.g., admin/availability.blade.php -->
<form action="/admin/availability" method="POST">
    @csrf
    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
        <div>
            <h3>{{ $day }}</h3>
            <label for="start_time_{{ $day }}">Start Time:</label>
            <input type="time" name="start_time_{{ $day }}" id="start_time_{{ $day }}"
                   value="{{ isset($availabilities[$day]) ? $availabilities[$day]->start_time : '' }}">

            <label for="end_time_{{ $day }}">End Time:</label>
            <input type="time" name="end_time_{{ $day }}" id="end_time_{{ $day }}"
                   value="{{ isset($availabilities[$day]) ? $availabilities[$day]->end_time : '' }}">

            Sluit voor deze dag:
            <input type="checkbox" name="closed_{{ $day }}" id="closed_{{ $day }}" 
                   {{ !isset($availabilities[$day]) ? 'checked' : '' }}>
        </div>
    @endforeach
    <button type="submit">Save Availability</button>
</form>

<script>
    // Function to toggle the disabled state of time inputs based on the checkbox state
    function toggleDay(day) {
        const isClosed = document.getElementById(`closed_${day}`).checked;
        document.getElementById(`start_time_${day}`).disabled = isClosed;
        document.getElementById(`end_time_${day}`).disabled = isClosed;

        if (isClosed) {
            document.getElementById(`start_time_${day}`).value = null;
            document.getElementById(`end_time_${day}`).value = null;
        }
    }

    // Add event listeners to all checkboxes to handle changes
    document.addEventListener('DOMContentLoaded', () => {
        const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        days.forEach(day => {
            const checkbox = document.getElementById(`closed_${day}`);
            checkbox.addEventListener('change', () => toggleDay(day));

            // Initialize the state on page load
            toggleDay(day);
        });
    });
</script>
