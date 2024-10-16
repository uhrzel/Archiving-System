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
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Default to fetching all thesis items if no search query is provided
        $thesis = Thesis::whereNotIn('status', ['pending', 'declined']);

        // If there is a search query, modify the query accordingly
        if ($query) {
            $thesis = $thesis->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('thesis_title', 'LIKE', "%{$query}%")
                    ->orWhere('abstract', 'LIKE', "%{$query}%")
                    ->orWhereHas('user', function ($q) use ($query) {
                        $q->where('name', 'LIKE', "%{$query}%");
                    });
            });
        }

        // Get the results
        $thesis = $thesis->get();

        // Determine if there are no results
        $noResults = $thesis->isEmpty();

        return view('home', ['thesis' => $thesis, 'noResults' => $noResults]);
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
