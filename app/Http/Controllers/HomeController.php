<?php

namespace App\Http\Controllers;

use App\Models\Rendez;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $appointments = Rendez::whereDate('date', Carbon::today())->get();
        return view('home', compact('appointments'));
    }
}
