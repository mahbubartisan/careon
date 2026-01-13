<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabWiseTestPrice extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function test()
    {
        return $this->belongsTo(MedicalTest::class, 'test_id');
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }
}
