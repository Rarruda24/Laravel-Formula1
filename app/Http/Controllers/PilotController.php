<?php

namespace App\Http\Controllers;

use App\Models\Pilot;
use App\Models\Team;
use Illuminate\Http\Request;

class PilotController extends Controller
{
    public function store(Request $request)
    {
        Pilot::create($request->all());
        return redirect()->route('main');
    }

    public function show(Pilot $pilot)
    {
        return view('welcome', ['pilot_show' => $pilot, 'teams' => Team::all(), 'pilots' => Pilot::all()]);
    }

    public function edit(Pilot $pilot)
    {
        return view('welcome', ['pilot_edit' => $pilot, 'teams' => Team::all(), 'pilots' => Pilot::all()]);
    }

    public function update(Request $request, Pilot $pilot)
    {
        $pilot->update($request->all());
        return redirect()->route('main');
    }

    public function destroy($id)
    {
        Pilot::findOrFail($id)->delete();
        return redirect()->route('main');
    }
}