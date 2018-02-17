<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Vehicletype;
class Vehicletype extends Model
{
    //
   // use SoftDeletes;
      protected $fillable = ['vehiclecode','vehicletype'];
    
}
