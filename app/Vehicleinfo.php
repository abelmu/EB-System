<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Vehicleinfo extends Model
{
    //
    use SoftDeletes;
     protected $fillable = ['platenumber','vehicletype'
     ,'servicekm','vehiclemodel','chasisnumber','datebaought','suppliername'
     ,'drivername','vehicleprice','fuelcap','wheelbase','abysiniacard','numofdoors','fueltype'
     ,'radiocassete','airconditionare'];
}
