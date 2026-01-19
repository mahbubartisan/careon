<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareProvider extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'languages' => 'array',
        'nid_ids' => 'array',
        'agree' => 'boolean',
    ];

    public function nidMedia()
    {
        return Media::whereIn('id', $this->nid_media_ids ?? [])->get();
    }

    public function licenseMedia()
    {
        return $this->belongsTo(Media::class, 'license_id');
    }

    public function trainingMedia()
    {
        return $this->belongsTo(Media::class, 'training_id');
    }

    public function policeMedia()
    {
        return $this->belongsTo(Media::class, 'police_id');
    }
}
