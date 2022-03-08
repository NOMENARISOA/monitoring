<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class sensor extends Eloquent
{
    protected $connection ='mongodb';
    use HasFactory;

    public function gateway(){
        return $this->belongsTo(gateway::class,'gateway_id');
    }

    public function realtime_value(){
        return $this->hasMany(realtime_value::class,'sensor_id');
    }


}
