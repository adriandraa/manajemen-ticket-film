<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'total_seats'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
