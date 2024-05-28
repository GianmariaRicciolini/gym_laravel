<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookCourse($courseId)
    {
        $course = Course::find($courseId);
        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated.');
        }

        if ($course && $course->users()->count() < $course->max_participants) {
            $user->courses()->attach($courseId);
            return redirect()->back()->with('success', 'Successfully booked the course.');
        }

        return redirect()->back()->with('error', 'Cannot book the course. It might be full.');
    }

    public function cancelBooking($courseId)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated.');
        }

        $user->courses()->detach($courseId);
        return redirect()->back()->with('success', 'Successfully canceled the booking.');
    }
}
