<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['garagecode', 'garagename', 
    'garagetelno'];
}
