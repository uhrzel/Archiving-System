<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $thesis = Thesis::all();
        return view('home', ['thesis' => $thesis]);
    }

    public function about()
    {
        return view('layouts.about');
    }
    public function contact()
    {
        return view('layouts.contact');
    }
    public function thesis()
    {
        return view('layouts.thesis');
    }
}
