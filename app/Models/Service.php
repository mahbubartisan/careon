<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'image', 'id');
    }
    
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
    
    public function careLevel()
    {
        return $this->hasMany(CareLevel::class);
    }
}
