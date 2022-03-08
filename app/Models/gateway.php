<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class gateway extends Eloquent
{
    protected $connection ='mongodb';
    use HasFactory;

    public function sensors(){
        return $this->hasMany(sensor::class,'gateway_id');
    }

}
