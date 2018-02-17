<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Vehicledriver extends Model
{
    //
    use SoftDeletes;
     protected $fillable = ['drivercode','drivername','driverdesc'];
}
