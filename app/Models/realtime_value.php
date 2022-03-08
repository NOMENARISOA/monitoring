<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class realtime_value extends Eloquent
{
    use HasFactory;

    public function sensor(){
        return $this->belongsTo(sensor::class,'sensor_id');
    }
}
