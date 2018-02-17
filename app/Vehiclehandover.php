<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiclehandover extends Model
{
    //
    protected $fillable = ['platenumber','vehicletype','enginesize'
     ,'servicekm','vehiclemodel','chasisnumber','datebaought','suppliername'
     ,'drivername','vehicleprice','fuelcap','wheelbase','tyresize','numofdoors','fueltype'
     ,'radiocassete','airconditionare'];
}
