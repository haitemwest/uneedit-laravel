<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAvailabilityForm()
    {
        $availabilities = Availability::all()->keyBy('day_of_week');
        return view('admin.availability', compact('availabilities'));
    }
    public function saveAvailability(Request $request)
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($days as $day) {
            $start_time = $request->input("start_time_$day");
            $end_time = $request->input("end_time_$day");
            $closed = $request->input("closed_$day");

            if ($closed) {
                // Delete availability for the day if marked as closed
                Availability::where('day_of_week', $day)->delete();
                continue; // Skip to the next day
            }

            if ($start_time == null || $end_time == null) {
                continue; // Skip this day if start or end time is not provided
            }

            // Update or create the availability for the day
            Availability::updateOrCreate(
                ['day_of_week' => $day],
                [
                    'start_time' => $start_time,
                    'end_time' => $end_time
                ]
            );
        }

        return redirect()->back()->with('status', 'Availability updated successfully!');
    }
}
