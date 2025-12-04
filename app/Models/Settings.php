<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function siteLogo()
    {
        return $this->belongsTo(Media::class, 'logo', 'id');
    }
    
    public function favIcon()
    {
        return $this->belongsTo(Media::class, 'fav_icon', 'id');
    }
}
