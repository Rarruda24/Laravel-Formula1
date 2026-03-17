<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'country'];

    public function pilots()
    {
        return $this->hasMany(Pilot::class);
    }
}