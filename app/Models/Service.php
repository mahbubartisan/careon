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

    public function serviceCareLevels()
    {
        return $this->hasMany(ServiceCareLevel::class);
    }
    
    public function careOptions()
    {
        return $this->hasMany(CareOption::class);
    }

    public function careLevels()
    {
        return $this->belongsToMany(
            CareLevel::class,
            'service_care_levels',
            'service_id',
            'care_level_id'
        )->withPivot(['description']); // IMPORTANT
    }

    public function type()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }
}
