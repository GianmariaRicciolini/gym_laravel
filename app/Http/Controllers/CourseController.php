<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->has('date')) 
        {
            $query->where('date', $request->input('date'));
        }

        $courses = $query->get();

        return view('courses.index', compact('courses'));
    }


    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function book(Request $request, Course $course)
    {
        // Controlla se l'utente è già iscritto
        if ($course->users()->where('user_id', $request->user()->id)->exists()) {
            return redirect()->route('profile.bookings')->with('error', 'You are already enrolled in this course.');
        }

        // Controlla se ci sono posti disponibili
        if ($course->users()->count() >= $course->max_participants) {
            return redirect()->route('profile.bookings')->with('error', 'This course is fully booked.');
        }

        // Iscrivi l'utente al corso
        $course->users()->attach($request->user());

        // Determina la pagina di reindirizzamento
        $redirectTo = $request->input('redirect_to') === route('profile.bookings') 
                      ? route('profile.bookings') 
                      : route('courses.index', ['date' => $request->input('date')]);

        return redirect($redirectTo)->with('success', 'You have successfully booked the course!');
    }

    public function cancel(Request $request, Course $course)
    {
        // Controlla se l'utente è iscritto al corso
        if (!$course->users()->where('user_id', $request->user()->id)->exists()) {
            return redirect()->back()->with('error', 'You are not enrolled in this course.');
        }

        // Rimuovi l'utente dal corso
        $course->users()->detach($request->user());

        // Determina la pagina di reindirizzamento
        $redirectTo = $request->input('redirect_to') === route('profile.bookings') 
                      ? route('profile.bookings') 
                      : route('courses.index', ['date' => $request->input('date')]);

        return redirect($redirectTo)->with('success', 'Your booking has been canceled successfully!');
    }
}

