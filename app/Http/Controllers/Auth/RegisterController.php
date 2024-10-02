<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Course; // Import the Course model

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'course' => ['required', 'exists:courses,id'], // Validate that the course exists
            'student_id' => ['required', 'string', 'max:255', 'unique:users'], // Ensure student_id is unique
            'coe_file' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'], // Validate file upload
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Store the COE file
        $coeFilePath = $data['coe_file']->store('coe_files', 'public'); // Adjust the storage path as necessary

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'course_id' => $data['course'], // Save the selected course ID
            'student_id' => $data['student_id'], // Store student_id
            'coe_file' => $coeFilePath, // Save the path of the uploaded file
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        $courses = Course::all(); // Fetch all courses
        return view('auth.register', compact('courses')); // Pass courses to the view
    }
}
