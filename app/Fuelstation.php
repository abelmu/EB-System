<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Fuelstation extends Model
{
	use SoftDeletes;
    //
     protected $fillable = ['stationcode', 'stationname', 
    'stationtype'];
}
