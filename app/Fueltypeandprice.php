<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Fueltypeandprice extends Model
{
    //
    use SoftDeletes;
     protected $fillable = ['fuelcode', 'fueltype', 
    'fuelprice','Maker'];
}
