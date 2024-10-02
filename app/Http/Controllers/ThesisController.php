<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thesis = Thesis::where('user_id', auth()->id())
            ->get();

        // Fetch only active courses
        $courses = Course::where('course_status', 'active')->get();

        // Pass the data to the view
        return view('layouts.thesis.index', compact('thesis', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /*    public function create()
    {
        $courses = Course::all();
        return view('layouts.students.thesis', compact('courses'));
    } */



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'thesis_title' => 'required|string|max:255',
            'thesis_file' => 'required|file|mimes:pdf',
            'thesis_course' => 'required|string|max:255',
            'abstract' => 'required|string',
        ]);


        // Store the thesis file
        if ($request->hasFile('thesis_file')) {
            // Store the file in the 'thesis' folder under 'public/storage'
            $validated['thesis_file'] = $request->file('thesis_file')->store('public/thesis');
        }

        $validated['user_id'] = auth()->id();

        // Create a new thesis record in the database
        Thesis::create($validated);

        return redirect()->route('thesis.index')->with('success', 'Thesis created successfully.');
    }

    public function updateStatus(Request $request)
    {
        $thesis = Thesis::find($request->thesis_id);

        if ($thesis) {
            $thesis->status = $request->status;
            $thesis->save();

            return response()->json(['success' => true, 'status' => $thesis->status]);
        }

        return response()->json(['success' => false, 'message' => 'Thesis not found']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $thesis = Thesis::with('user')->findOrFail($id);
        return response()->json([
            'thesis_title' => $thesis->thesis_title,
            'user' => $thesis->user,
            'thesis_course' => $thesis->thesis_course,
            'status' => $thesis->status,
            'thesis_file_path' => asset('storage/thesis/' . basename($thesis->thesis_file)), // Adjust as needed
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'edit_thesis_title' => 'required|string|max:255',
                'edit_thesis_file' => 'nullable|file|mimes:pdf',
                'edit_thesis_course' => 'required|string',
                'edit_thesis_abstract' => 'required|string',
            ],
            [
                'edit_thesis_file.mimes' => 'The edit thesis file must be a file of type: pdf.',
            ]
        );

        $thesis = Thesis::findOrFail($id);
        Log::info('Thesis Retrieved: ', $thesis->toArray()); // Log thesis data

        // Update thesis details
        $thesis->thesis_title = $request->edit_thesis_title;
        $thesis->thesis_course = $request->edit_thesis_course;
        $thesis->abstract = $request->edit_thesis_abstract;

        // Check if a new file is uploaded
        if ($request->hasFile('edit_thesis_file')) {
            // Store the new thesis file in 'public/thesis' directory
            $path = $request->file('edit_thesis_file')->store('public/thesis'); // Specify the 'public' disk
            $thesis->thesis_file = $path; // Update the file path in the thesis record
            Log::info('File stored at: ' . $path); // Log the file storage path
        }

        Log::info('Saving Thesis: ', $thesis->toArray());

        try {
            $thesis->save();
            Log::info('Thesis updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating thesis: ' . $e->getMessage());
            return redirect()->route('thesis.index')->with('error', 'Failed to update thesis.');
        }

        return redirect()->route('thesis.index')->with('success', 'Thesis updated successfully!');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thesis $thesis)
    {
        try {
            Log::info('Deleting Thesis ID: ' . $thesis->id);
            $thesis->delete();
            return redirect()->route('thesis.index')->with('success', 'Thesis deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting thesis: ' . $e->getMessage());
            return redirect()->route('thesis.index')->with('error', 'Failed to delete thesis.');
        }
    }
}
