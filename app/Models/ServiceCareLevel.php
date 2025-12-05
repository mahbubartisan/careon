<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCareLevel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function careLevel()
    {
        return $this->belongsTo(CareLevel::class);
    }

    public function careOptions()
    {
        return $this->careLevel->careOptions();
    }
}
