<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
    // Adicione 'team_id' dentro do array fillable
    protected $fillable = ['name', 'number', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}