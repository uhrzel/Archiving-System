<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

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


        return view('admin.pending.index');
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
    public function show(admin $admin)
    {
        //
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
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Find the admin by ID
        $admin = admin::find($id);

        // Update only name and email, leave the role as is
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Students data updated successfully!');
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
