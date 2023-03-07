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
        $query = request()->input("query");
        $appointments = Rendez::whereDate('date', Carbon::today())->where(function ($q) use ($query) {
            $q->where('nom', 'like', '%' . $query . '%')
              ->orWhere('prenom', 'like', '%' . $query . '%')
              ->orWhere('tlf', 'like', '%' . $query . '%')
              ->orWhere('adress', 'like', '%' . $query . '%')
              ->orWhere('gender', 'like', '%' . $query . '%');
        })
        ->get();
        return view('home', compact('appointments'));
    }
}
