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

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'max_participants' => 'required|integer',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'max_participants' => 'required|integer',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }

    public function book(Request $request, Course $course)
    {
        // Logica per prenotare il corso
        // Esempio: $course->users()->attach($request->user());

        return redirect()->route('courses.index')->with('success', 'Course booked successfully!');
    }

    public function cancel(Request $request, Course $course)
    {
        // Logica per cancellare la prenotazione del corso
        // Esempio: $course->users()->detach($request->user());

        return redirect()->route('courses.index')->with('success', 'Course booking canceled successfully!');
    }
}
