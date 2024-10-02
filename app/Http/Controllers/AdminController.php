<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Thesis;
use Illuminate\Http\Request;
use App\Mail\StatusUpdated;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function archive(Request $request)
    {
        // You can add search functionality if needed


        return view('admin.archive.index');
    }

    /**
     * Display the courses view.
     */
    public function courses(Request $request)
    {


        return view('admin.courses.index');
    }

    /**
     * Display the pending view.
     */
    public function pending(Request $request)
    {
        // Fetch all theses with a status of 'pending'
        $thesis = Thesis::where('status', 'pending')->get();

        // Pass the fetched theses to the view
        return view('admin.pending.index', compact('thesis'));
    }

    public function index(Request $request)
    {
        //
        $search = $request->get('search');

        $data = Admin::where('role', 'user') // Change 'student' to the desired role
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', '%' . $search . '%');
            })
            ->get();
        return view('layouts.students.index', compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Admin::findOrFail($id);

        return response()->json([
            'student_id' => $student->student_id,
            'name' => $student->name,
            'email' => $student->email,
            'role' => $student->role,
            'status' => $student->status,
            'coe_file_path' => asset('storage/coe_files/' . basename($student->coe_file)),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $admin = admin::find($id);
        return view('layouts.students.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        // Validate the input, making coe_file optional for updates
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|string|in:pending,approved,banned'
        ]);

        // Find the admin by ID
        $admin = admin::find($id);

        // Update the name, email, and status
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->status = $request->status; // Update status


        // Save the changes
        $admin->save();

        // Send email notification if status is approved or banned
        if ($admin->wasChanged('status')) { // Check if status has changed
            if ($request->status === 'approved' || $request->status === 'banned') {
                Mail::to($admin->email)->send(new StatusUpdated($admin, $request->status));
            }
        }

        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Student data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $admin = admin::find($id);

        if ($admin) {
            $admin->delete();
            return redirect()->route('students.index')->with('message', 'Students deleted successfully.');
        }

        return redirect()->route('students.index')->with('error', 'Admin not found.');
    }
}
