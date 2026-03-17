<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Pilot; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class TeamController extends Controller
{
    public function store(Request $request)
    {
        Team::create($request->all());
        return redirect()->route('main');
    }

    public function show(Team $team)
    {
        return view('welcome', [
            'team_show' => $team, 
            'teams' => Team::all(), 
            'pilots' => Pilot::all()
        ]);
    }

    public function edit(Team $team)
    {
        return view('welcome', [
            'team_edit' => $team, 
            'teams' => Team::all(), 
            'pilots' => Pilot::all()
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $team->update($request->all());
        return redirect()->route('main');
    }

    public function destroy($id)
    {
        Team::findOrFail($id)->delete();
        return redirect()->route('main');
    }
}