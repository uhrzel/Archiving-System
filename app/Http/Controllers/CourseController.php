<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_description' => 'required|string',
            'course_status' => 'required|in:active,inactive',
        ]);

        // Create a new course record in the database
        Course::create([
            'course_name' => $request->course_name,
            'course_description' => $request->course_description,
            'course_status' => $request->course_status,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'edit_course_name' => 'required|string|max:255',
            'edit_course_description' => 'required|string',
            'edit_course_status' => 'required|in:active,inactive',
        ]);

        // Find the course by ID
        $course = Course::findOrFail($id);
        $course->update([
            'course_name' => $request->edit_course_name,
            'course_description' => $request->edit_course_description,
            'course_status' => $request->edit_course_status,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
