<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function book(Request $request, Course $course)
    {
        $user = $request->user();
        if ($course->users()->count() < $course->max_participants) {
            $user->courses()->attach($course->id);
            return redirect()->route('courses.index')->with('success', 'Successfully booked the course.');
        }

        return redirect()->route('courses.index')->with('error', 'Cannot book the course. It might be full.');
    }

    public function cancel(Request $request, Course $course)
    {
        $user = $request->user();
        $user->courses()->detach($course->id);
        return redirect()->route('courses.index')->with('success', 'Successfully canceled the booking.');
    }
}
