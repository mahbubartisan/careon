<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticBooking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'tests' => 'array',
    ];

    // public function lab()
    // {
    //     return $this->belongsTo(Lab::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
