<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Pilot;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'teams' => Team::all(),
            'pilots' => Pilot::with('team')->get()
        ]);
    }
}