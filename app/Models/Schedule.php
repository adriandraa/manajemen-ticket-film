<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['film_id', 'theater_id', 'start_time'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

