<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
//    public function featured()
//    {
//        $this->belongsTo(related: Media::class,foreignKey: 'featured_media_id');
//    }
    public function location()
    {
       return $this->belongsTo(related: Location::class,foreignKey: 'location_id');
    }
    public function gallery()
    {
       return $this->hasMany(related: Media::class,foreignKey: 'property_id');
    }

}
