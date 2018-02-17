<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Fuelorder extends Model
{
    //
 	use SoftDeletes;
    protected $fillable = ['platenumber', 'currentfuellevel', 
    'drivername','stationame','fueltype'];
}
