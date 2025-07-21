<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['theater_id', 'seat_number'];

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
}

