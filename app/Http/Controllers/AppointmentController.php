<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function getAvailableTimes(Request $request)
    {
        $date = $request->query('date');
        $dayOfWeek = date('l', strtotime($date));

        // Fetch admin-set availability for the given day of the week
        $availability = Availability::where('day_of_week', $dayOfWeek)->first();
        
        if (!$availability) {
            return response()->json([]);
        }

        // Generate time slots based on availability
        $startTime = strtotime($availability->start_time);
        $endTime = strtotime($availability->end_time);
        $timeSlots = [];

        for ($time = $startTime; $time <= $endTime; $time = strtotime('+1 hour', $time)) {
            $timeSlots[] = date('h:i A', $time);
        }

        // Fetch taken slots
        $takenSlots = Appointment::whereDate('date', $date)->pluck('start_time')->toArray();

        // Calculate available slots
        $availableSlots = array_diff($timeSlots, $takenSlots);

        return response()->json($availableSlots);
    }

    public function getEvents()
    {
        $appointments = Appointment::all();
        $events = [];

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->description,
                'start' => $appointment->date,
                'url' => route('appointments.day', ['date' => $appointment->date])
            ];
        }

        return response()->json($events);
    }

    public function showCalendar()
    {
        return view('appointments.calendar');
    }

    public function showAppointmentsForDay($date)
    {
        $appointments = Appointment::whereDate('date', $date)->get();
        return view('appointments.day', compact('appointments', 'date'));
    }
    public function createAppointment(Request $request) {
        $request["user_id"] = auth()->id();
        // dd($request->all());

        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'date' => 'required|date',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
        ]);

        // Convert start_time and end_time to 24-hour format
        $start_time = Carbon::createFromFormat('h:i A', $request->start_time)->format('H:i:s');
        $end_time = Carbon::createFromFormat('h:i A', $request->end_time)->format('H:i:s');

        Appointment::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'reason' => $request->reason,
            'date' => $request->date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'user_id' => auth()->id(), // Assuming the user is authenticated
        ]);

        return AppointmentController::statusAppointment();
        // return redirect()->route('/appointments/create')->with('success', 'Appointment booked successfully!');    
    }

    public function statusAppointment() {
        return view('appointments.create');
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        // Dump and Die to debug the request data
        // dd($request->all());

        // Alternatively, you can use var_dump and exit
        // var_dump($request->all());
        // exit;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'appointment_time' => 'required|date',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointment.create')->with('success', 'Appointment booked successfully!');
    }

    public function getSubjects() {
        $subjects = DB::select("SELECT * FROM subjects");

        return $subjects;
    }

    public function showAppointmentBooking() {
        $subjects = $this->getSubjects();
        return view('appointments.dashboard', ['subjects' => $subjects]);
    }
}
